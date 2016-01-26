<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

	<?php if ($model->parent): ?>
    <a href=<?= Url::to(['article/view', 'id' => $model->parent]) ?>><?= Yii::t('app', 'Go to "Parent\'s" Article') ?></a>
	<?php endif ?>
	
	<h1><?= Html::encode($this->title) ?>

    <div class="pull-right">

    <?php if (Yii::$app->user->can('adminArticle')): ?>

        <?= Html::a(Yii::t('app', 'Back'), ['admin'], ['class' => 'btn btn-warning']) ?>

    <?php endif ?>

    <?php if (Yii::$app->user->can('updateArticle', ['model' => $model])): ?>

        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?php endif ?>

    <?php if (Yii::$app->user->can('deleteArticle')): ?>

        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this article?'),
                'method' => 'post',
            ],
        ]) ?>

    <?php endif ?>
    
    </div>

    </h1>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //[
            //    'label' => Yii::t('app', 'Author'),
            //    'value' => $model->authorName,
            //],
            //'title',
            'summary:ntext',
            //'content:html',
            // [
            //     'label' => Yii::t('app', 'Status'),
            //     'value' => $model->statusName,
            // ],
            //[
            //    'label' => Yii::t('app', 'Category'),
            //    'value' => $model->categoryName,
            //],
            //'created_at:dateTime',
            //'type',
            //'parent'
            //'updated_at:dateTime',
        ],
    ]) ?>
		
	<?= $model->content; ?>
	<h6>
	<?= Yii::t('app', 'Related "Children\'s" Articles:') ?>
    </h6>
		
	<?= ListView::widget([
		'dataProvider' => $childrens,
		'options' => [
		'tag' => 'div',
		'class' => 'list-wrapper',
		'id' => 'list-wrapper',
		],
		'layout' => "{pager}\n{items}\n",
   		'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_list_item',['model' => $model]);
    },
    ])?>	
	
</div>
