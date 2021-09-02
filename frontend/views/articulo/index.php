<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use \backend\models\Articulo\ArticuloArchivo;
use \backend\models\Archivo\Archivo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Articulo\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artículos';
$this->params['breadcrumbs'][] = $this->title;

$articulos = \frontend\models\Articulo\Articulo::find()->all();
$articulo = $articulos[1];
?>



<div class="container text-center">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background-color: (0,100,0,1)">
        <a class="navbar-brand justify-content-start" style="margin-left: 3%" href="<?= Yii::$app->homeUrl; ?>"><img
                    class="che_nav_logo" src="img/logo/che_positivo-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <div class="" style="width: 60px"></div>
                </li>
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
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" style="color: #fff">ARTÍCULOS</a>
                <li class="nav-item ">
                    <div class="" style="width: 200px"></div>
                </li>


            </ul>

        </div>
    </nav>



    <br>
    <br>
    <br>
    <br>


</div>
<section class="about-section text-center " id="Vida-Obra">

    <h1 class="underline-small" style="">Artículos</h1>
    <br>
    <br>

    <div class="row col-md-12">
        <div class="card col-md-12" >
            <div class="row no-gutters col-md-12 " style="align-content: left;">
                <div class="img-gallery col-md-4 img-gallery" style="height: 300px" >
                    <img style="max-width: 100%; height: height: 300px;" src="../web/img/2.jpg"
                         alt="">
                </div>
                <div class="col-md-6 offset-md-1" style="">
                    <div class="card-body" style="  text-align: left;">
                        <h3 class="card-title" style="color: #828735;">Che: experiencias comunicativas en torno a
                            su vida y obra</h3>
                        <h5 class="card-title" style="color: #828735;">por Camilo Guevara | 4 de agosto de 2015 </h5>
                        <p class="card-text" >El trabajo del Centro de Estudios Che Guevara se divide, en la práctica,
                            en dos áreas principales, una científica, dedicada a la investigación y
                            todo aquello que concierne al mundo académico, y otra divulgativa,
                            que obtiene primordialmente de la primera los contenidos para llevar a
                            cabo todos los proyectos que le atañen.</p>
                        <?= Html::a('<span style="color: black;"> Seguir leyendo </span>', ['/articulo/view', 'id'=> $articulo->id_articulo], [
                            'class' => 'button-ref',
                            ])
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>

    <div class="row col-md-12">
        <div class="card col-md-12" >
            <div class="row no-gutters col-md-12 " style="align-content: left;">
                <div class="img-gallery col-md-4 img-gallery" style="height: 300px" >
                    <img style="max-width: 100%; height: height: 300px;" src="../web/img/3.jpg"
                         alt="">
                </div>
                <div class="col-md-6 offset-md-1" style="">
                    <div class="card-body" style="  text-align: left;">
                        <h3 class="card-title" style="color: #828735;">Che: experiencias comunicativas en torno a
                            su vida y obra</h3>
                        <h5 class="card-title" style="color: #828735;">por Camilo Guevara | 4 de agosto de 2015 </h5>
                        <p class="card-text" >El trabajo del Centro de Estudios Che Guevara se divide, en la práctica,
                            en dos áreas principales, una científica, dedicada a la investigación y
                            todo aquello que concierne al mundo académico, y otra divulgativa,
                            que obtiene primordialmente de la primera los contenidos para llevar a
                            cabo todos los proyectos que le atañen.</p>
                        <a class="card-text"><a class="button-ref" href="..." style="color: black;">Seguir leyendo</a></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="row col-md-12">
        <div class="card col-md-12" >
            <div class="row no-gutters col-md-12 " style="align-content: left;">
                <div class="img-gallery col-md-4 img-gallery" style="height: 300px" >
                    <img style="max-width: 100%; height: height: 300px;" src="../web/img/1.jpg"
                         alt="">
                </div>
                <div class="col-md-6 offset-md-1" style="">
                    <div class="card-body" style="  text-align: left;">
                        <h3 class="card-title" style="color: #828735;">Che: experiencias comunicativas en torno a
                            su vida y obra</h3>
                        <h5 class="card-title" style="color: #828735;">por Camilo Guevara | 4 de agosto de 2015 </h5>
                        <p class="card-text" >El trabajo del Centro de Estudios Che Guevara se divide, en la práctica,
                            en dos áreas principales, una científica, dedicada a la investigación y
                            todo aquello que concierne al mundo académico, y otra divulgativa,
                            que obtiene primordialmente de la primera los contenidos para llevar a
                            cabo todos los proyectos que le atañen.</p>
                        <a class="card-text"><a class="button-ref" href="..." style="color: black;">Seguir leyendo</a></a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <br>
    <br>
    <br>
    <br>
</section>