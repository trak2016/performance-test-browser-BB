<?php
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
?>

<article class="item" data-key="<?= $model->id; ?>">

	<?= DetailView::widget([
        'model' => $model,
		'attributes' => [
			[
                'label' => '<a href="'.Url::to(['article/view', 'id' => $model->id]).'" >'. $model->title.'</a>',
                'value' => $model->summary,
           ],
		],
    ]) ?>

</article>