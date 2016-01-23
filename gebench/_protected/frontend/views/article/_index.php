<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Articles';
?>
<div style="background: #383838 ;">
    <h2 style="text-align : center">
        <a  href=<?= Url::to(['article/view', 'id' => $model->id]) ?>><?= $model->title ?></a>
    </h2>


    <p style="text-align : center"><?= $model->summary ?></p>

    <a class="btn btn-primary" href=<?= Url::to(['article/view', 'id' => $model->id]) ?>>
        <?= yii::t('app','Read more'); ?><span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    <p class="time" style="text-align : right"><span class="glyphicon glyphicon-time"></span> 
        <?= Yii::t('app','Published on').' '.date('F j, Y, g:i a', $model->created_at) ?></p>
   </div>
    <hr class="article-devider">
    
 
