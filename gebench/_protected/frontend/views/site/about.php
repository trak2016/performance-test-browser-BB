<?php
use yii\helpers\Html;

use giovdk21\yii2SyntaxHighlighter\SyntaxHighlighter as SyntaxHighlighter;
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php SyntaxHighlighter::begin(['brushes' => ['php']]);
		echo SyntaxHighlighter::getBlock('        
	CustomActor Lukas = new CustomActor(
			"Lukas",23,
            "Rzeszów University of Technology",
            new ArrayList<String>(){ {
                add("C++");
                add("Java");
                add("PHP");
                add("JCL");
            },
			new Image((Texture) Assets.assetManager.get(TextureConst.LUKAS))
            };
    );

    stageRzeszowUniversity.addActor(Lukas);
				
	.				
	.
	.			
public class CustomActor extends Actor {
        private String name;
        private int age;
        private String university;
        private ArrayList<String> languages;
		private Image image;
	.				
	.
	.
				
', 'php');


SyntaxHighlighter::end(); ?>
</div>
