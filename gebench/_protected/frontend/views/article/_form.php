<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use giovdk21\yii2SyntaxHighlighter\SyntaxHighlighter as SyntaxHighlighter;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'content')->widget(CKEditor::className(),
            ['editorOptions' => [ 'preset' => 'full', 'inline' => false]]); ?>
            
    

    <div class="row">
    <div class="col-lg-6">

        <?= $form->field($model, 'status')->dropDownList($model->statusList) ?>

        <?= $form->field($model, 'category')->dropDownList($model->categoryList) ?>
        
        <?= $form->field($model, 'type')->dropDownList($model->typeList) ?>
        
        <?= $form->field($model, 'parent')->textInput(['maxlength' => 255]) ?>

    </div>
    </div> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') 
            : Yii::t('app', 'Update'), ['class' => $model->isNewRecord 
            ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', 'Cancel'), ['article/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?php SyntaxHighlighter::begin(['brushes' => ['php']]);
		echo SyntaxHighlighter::getBlock('        
		bg = new Image(bgTex);
        bg.setPosition(Utils.WIDTH / 2 - bg.getWidth() / 2, Utils.HEIGHT / 2 - bg.getHeight()/2);
        bg.setPosition(0 - bg.getWidth() / 2, -bg.getHeight() / 2);
        addActor(bg);

        digit = new Image(digitTex);
        digit.setPosition(Utils.WIDTH / 2 - digit.getWidth() / 2, Utils.HEIGHT / 2 - digit.getHeight() );
        digit.setPosition(-digit.getWidth() / 2, -digit.getHeight());
        addActor(digit);

        PolygonSpriteBatch polygonSpriteBatch = new PolygonSpriteBatch();
        radialSprite = new ProgressCircle(circleTex,polygonSpriteBatch );
        radialSprite.setPosition(Utils.WIDTH / 2 - radialSprite.getWidth() / 2, Utils.HEIGHT / 2 - radialSprite.getHeight() / 2);
', 'php');
SyntaxHighlighter::end(); ?>

</div>
