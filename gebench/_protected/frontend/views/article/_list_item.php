<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->id; ?>">
	<h2 class="title">
	<?= Html::a(Html::encode($model->title)) ?>
	</h2>
	<h2 class="title">
	<?= Html::a(Html::encode($model->type)) ?>
	</h2>
	
	
</article>