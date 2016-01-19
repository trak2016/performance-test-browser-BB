<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>



<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<link type="text/css" rel="stylesheet" href="/themes/syntaxhighlight/css/shCoreRDark.css"/>
	<link type="text/css" rel="stylesheet" href="/themes/syntaxhighlight/css/shThemeRDark.css"/>	
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shCore.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushA3.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushBash.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushColdFusion.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushCpp.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushCSharp.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushCss.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushDelphi.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushDiff.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushErlang.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushGroovy.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushJava.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushJavaFX.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushJScript.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushPerl.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushPhp.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushPlain.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushPowerShell.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushPython.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushRuby.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushScala.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushSql.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushVb.js"></script>
	<script type="text/javascript" src="/themes/syntaxhighlight/js/shBrushXml.js"></script>	
	<script type="text/javascript">SyntaxHighlighter.all();</script>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::t('app', Yii::$app->name),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);

            // everyone can see Home page
            $menuItems[] = ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']];

            // we do not need to display Article/index, About and Contact pages to editor+ roles
            if (!Yii::$app->user->can('editor')) 
            {
                $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/index']];
                $menuItems[] = ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']];
                $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
                $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
            }

            // display Article admin page to editor+ roles
            if (Yii::$app->user->can('editor'))
            {
                $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/admin']];
            }            
            
            // display Signup and Login pages to guests of the site
            if (Yii::$app->user->isGuest) 
            {
                $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
            }
            // display Logout to all logged in users
            else 
            {
                $menuItems[] = [
                    'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
           
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; <?= Yii::t('app', Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
