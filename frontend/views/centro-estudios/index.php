<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Centro de Estudios';
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Centro Che';
$noticias = new \frontend\models\Noticia\NoticiaArchivo();
$noticias = \frontend\models\Noticia\Noticia::find()->where(['publico' => 1])->all();
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background-color: (0,100,0,1)">
    <a class="navbar-brand justify-content-start" style="margin-left: 3%" href="<?= Yii::$app->homeUrl; ?>"><img
            class="che_nav_logo" src="img/logo/che_positivo-01.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
        <ul class="navbar-nav ">

            <li class="nav-item ">
                <a class="nav-link" style="color: #828735" href="#about">CENTRO DE ESTUDIOS <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <div class="" style="width: 60px"></div>
            </li>
            <li class="nav-item ">
                <a class="nav-link"><i style="color: #fff" class="fas fa-star"></i></a>
            </li>
            <li class="nav-item ">
                <div class="" style="width: 60px"></div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" style="color: #fff" href="<?= Yii::$app->homeUrl; ?>?=vida_y_obra">VIDA Y OBRA</a>
            <li class="nav-item ">
                <div class="" style="width: 80px"></div>
            </li>


        </ul>

    </div>
</nav>



<br>
<br>
<br>
<br>
<section class="about-section text-center" id="Vida-Obra">

    <h1 class="" style="text-decoration: ">Centro de Estudios Necesito diseño</h1>
    <h2 class="" style="text-decoration: ">Solamente acceso a vistas por ahora</h2>

    <p>
        <?= Html::a('<span> Artículos </span>', ['/articulo/index'], [
            'class' => 'btn btn-success',
            "title" => "Agregar"])
        ?>
    </p>

</section>
