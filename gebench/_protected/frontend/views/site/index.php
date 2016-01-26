<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>GE Benchmarks</h1>
        <p class="lead">Strona poświęcona programowaniu gier na platformy mobilne<br/>
		z wykorzystaniem silników graficznych<br/><b>Cocos2d-x</b> i <b>Libgdx</b></p>
    </div>

    <div class="body-content">

        <div class="row">
           
             <div class="col-lg-6" style="text-align: center">
                <h3>Publikacje</h3>

                <p>Zobacz najlepsze publikacje w serwisie </p>

                <p><a class="btn btn-default" href="/article/index">Zobacz Publikacje &raquo;</a></p>
            </div>
         
            <div claess="col-lg-6" style="text-align: center">
                <h3>GE Benchmarks</h3>

                <p>Zobacz etapy tworzenia platformy Graphic Engine Benchmarks. </p>

                <p><a class="btn btn-default" href="/article/view?id=13">Zobacz GEBENCH &raquo;</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h3 style="text-align: center">Cocos2d-x</h3>
  				 <p style="text-align: center" ><a class="btn btn-default" href="http://cocos2d-x.org/"><img style="height:200px; width:300px" alt="" src="/uploads/cocos_main.png"/></a></p>
            </div>
            <div class="col-lg-6">
                <h3 style="text-align: center">Libgdx</h3>
                <p style="text-align: center" ><a class="btn btn-default" href="https://libgdx.badlogicgames.com/"><img style="height:200px; width:300px" alt="" src="/uploads/libgdx-main.png"/></a></p>
            </div>
        </div>

    </div>
</div>

