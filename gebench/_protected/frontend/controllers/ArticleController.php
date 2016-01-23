<?php
namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\ArticleSearch;
use yii\web\NotFoundHttpException;
use yii\web\MethodNotAllowedHttpException;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends FrontendController
{
    /**
     * Lists all Article models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        /**
         * How many articles we want to display per page.
         * @var integer
         */
        $pageSize = 5;//2;

        /**
         * Articles have to be published.
         * @var boolean
         */
        $published = true;

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize, $published);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * 
     * @param  integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    		
    	$dataProvider = array($this->getChildren($id));
    	
    	
     	if($this->findModel($id)->getAttribute("parent")==0){
    	return $this->render('view', [
    			'model' => $this->findModel($id), 'childrens' => $this->getRootArticles($id)
    			]);
    
    	}
    	
        return $this->render('view', [
            'model' => $this->findModel($id), 'childrens' => $dataProvider[0]
        ]);
    }
    
    protected function getChildren($id){
    	$query = Article::find();
    	$query->where(['parent' => $id]);
    	 
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			'sort'=> ['defaultOrder' => ['id' => SORT_ASC]],
    			'pagination' => [
    			'pageSize' => 10,
    			]
    			]);
    
    	return $dataProvider;
    }
    
    
    protected function getRootArticles($id){
    	$query = Article::find();
    	$query->where(['rootParent' => $id]);
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			'sort'=> ['defaultOrder' => ['id' => SORT_ASC]],
    			'pagination' => [
    			'pageSize' => 10,
    			]
    			]);

    	return $dataProvider;
    }
    
    protected function lookForOffspring($articleIds){
    	
        $count =  count($articleIds);

    	$i = 0;
    	for($i; $i < $count; $i++ ){
    		if(!$this->modelExists($articleIds[$i]))//  || $this->articleIsOnList($articleIds[$i],$articleIds))
    			continue;
    	
    		$dump = array($this->getChildren($articleIds[$i])->getKeys());
    	
    		$dump = $dump[0];
    		//var_dump($dump);
    		
    		$count2 =  count($dump);
    		$j = 0;
    		for($j; $j < $count2; $j++ ){
    			// sprawdzic powtorzenia
    			if(!$this->articleIsOnList($j,$articleIds)){
    				//var_dump($dump[$j]);
    				array_push($articleIds, $dump[$j] );
    				$nowe = ( $this->lookForOffspring(array($dump[$j])));
    				//var_dump($nowe);
    				$articleIds = array_merge($articleIds,$nowe);
    				$articleIds = array_unique($articleIds);
    				//var_dump($articleIds);
    			}
    		}
    		 
    	}
    	var_dump($articleIds);
    	sort($articleIds);
    	return $articleIds;
    	
    	
    }
    
    protected function articleIsOnList($id,$articlesIds ){
    	$i = 0;
    	$count =  count($articlesIds);
    	for($i; $i < $count; $i++ ){
    		if($articlesIds[$i]==$id){
    			return true;
    		}
    	}
    	
    	return false;
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @param  integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->user->can('updateArticle', ['model' => $model])) 
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                return $this->redirect(['view', 'id' => $model->id]);
            } 
            else 
            {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else
        {
            throw new MethodNotAllowedHttpException(Yii::t('app', 'You are not allowed to access this page.'));
        } 
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * 
     * @param  integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('admin');
    }

    /**
     * Manage Articles.
     * 
     * @return mixed
     */
    public function actionAdmin()
    {
        /**
         * How many articles we want to display per page.
         * @var integer
         */
        $pageSize = 11;

        /**
         * Only admin+ roles can see everything.
         * Editors will be able to see only published articles and their own drafts @see: search(). 
         * @var boolean
         */
        $published = (Yii::$app->user->can('admin')) ? false : true ;

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize, $published);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * 
     * @param integer  $id
     * @return Article The loaded model.
     * 
     * @throws NotFoundHttpException if the model cannot be found.
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected  function modelExists($id){
    	if (($model = Article::findOne($id)) !== null)
    	{
    		return $model;
    	}
    	else
    	{
    		return false;
    	}
    }
    
    protected function findChildrens($id){
    	
    	
    	$query = Article::find()->where(['parent' => $id])->all();
    	
    	return $query;
    	
    }
}
