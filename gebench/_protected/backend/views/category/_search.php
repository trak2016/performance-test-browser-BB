<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'cat_name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'avatarlink') ?>

    <?= $form->field($model, 'manner') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'orderlist') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
