<?php
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
?>

<article class="item" " data-key="<?= $model->id; ?>">

			<?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
        'template' => '<tr><th width="30%">{label}</th><td>{value}</td></tr>',
		'attributes' => [
			[
                'label' => '<a  href="'.Url::to(['article/view', 'id' => $model->id]).'" >'. $model->title.'</a>',
                'value' => $model->summary,
                
           ],
		],
    ]) ?>
    

</article>