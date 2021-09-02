<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Index';
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Centro Che';
$noticias = new \frontend\models\Noticia\NoticiaArchivo();
$noticias = \frontend\models\Noticia\Noticia::find()->where(['publico' => 1])->all();
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background-color: (0,100,0,0.3)">
    <a class="navbar-brand justify-content-start" style="margin-left: 3%" href="<?= Yii::$app->homeUrl; ?>"><img
                class="che_nav_logo" src="img/logo/che_positivo-01.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
        <ul class="navbar-nav ">

            <li class="nav-item ">
                <a class="nav-link" style="color: #fff" href="<?= Yii::$app->homeUrl; ?>?r=centro-estudios%2Findex">CENTRO DE ESTUDIOS <span
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
                <a class="nav-link" style="color: #fff" href="<?= Yii::$app->homeUrl; ?>?r=vida-obra%2Findex">VIDA Y OBRA</a>
            <li class="nav-item ">
                <div class="" style="width: 80px"></div>
            </li>


        </ul>

    </div>
</nav>

<div class="" style="margin-top: 0px">
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="../web/img/quienessomos/main1.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px">
                    <!--<h5>Versión en modo de pruebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../web/img/quienessomos/main2.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                    <!--<h5>Versión en modo de pruebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../web/img/quienessomos/main3.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                    <!--<h5>Versión en modo de purebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../web/img/quienessomos/main4.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                    <!--<h5>Versión en modo de purebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../web/img/quienessomos/main5.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                    <!--<h5>Versión en modo de purebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../web/img/quienessomos/main6.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                    <!--<h5>Versión en modo de purebas</h5>
                    <p>Solo para propósitos de desarrollo</p>-->
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<hr class="page_separator"/>
<section class="about-section text-center" id="actualidad">

    <h1 class="underline-small" style="text-decoration: ">Actualidad</h1>

    <br><br>
    <div class="row col-md-12">

        <div class="col-md-4">
            <div class="card" style="">
                <div style="height: 200px; background-color: rgba(0 , 0 , 0 , 0.05);">
                    <img src="../web/img/quienessomos/3333.jpg"
                         style="max-width:100%; max-height:100%; object-fit: contain"
                         class="card-img-top" alt="...">
                </div>
                <br>
                <div class="card-body card-body-side">
                    <h5 class="card-title card-color ">Che Guevara: fases integradoras en su proyecto de cambio
                        social</h5>
                    <h6 class="card-black">por Katerina Morales | 4 de agosto de 2015</h6>
                    <br>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" style="color:#828735;">Seguir leyendo...</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div style="height: 200px; background-color: rgba(0 , 0 , 0 , 0.05);">
                    <img src="../web/img/quienessomos/3333.jpg"
                         style="max-width:100%; max-height:100%; object-fit: contain"
                         class="card-img-top" alt="...">
                </div>
                <br>
                <div class="card-body card-body-side">
                    <h5 class="card-title card-color ">Che Guevara: fases integradoras en su proyecto de cambio
                        social</h5>
                    <h6 class="card-black">por Katerina Morales | 4 de agosto de 2015</h6>
                    <br>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" style="color:#828735;">Seguir leyendo...</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <div style="height: 200px; background-color: rgba(0 , 0 , 0 , 0.05);">
                    <img src="../web/img/quienessomos/3333.jpg"
                         style="max-width:100%; max-height:100%; text-align: justify"
                         alt="...">
                </div>
                <br>
                <div class="card-body card-body-side">
                    <h5 class="card-title card-color ">Che Guevara: fases integradoras en su proyecto de cambio
                        social</h5>
                    <h6 class="card-black">por Katerina Morales | 4 de agosto de 2015</h6>
                    <br>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" style="color:#828735;">Seguir leyendo...</a>
                </div>
            </div>
        </div>

    </div>

</section>


<hr class="page_separator"/>
<br>
<section class="about-section text-center" id="Mapa">

    <h1 class="underline-small" style="text-decoration: ">Mapa</h1>

    <br><br>
    <!--------Mapa------------------------------------------------------------------------------------------------->
<iframe src="https://www.google.com/maps/d/embed?mid=1UQQMw-m_DPTKOJPfYTs3ZkFBobP39SBE&hl=es" width="100%" height="480"></iframe>


</section>


<hr class="page_separator"/>
<br>
<section class="about-section text-center" id="Paradigma">

    <h1 class="underline-small" style="text-decoration: ">Paradigma</h1>

    <br><br>


</section>

<br>
<br>
<br>
<br>
<br>


<hr class="page_separator"/>
<section class="about-section text-center" id="about">

    <h1 class="underline-small" style="text-decoration: ">Quiénes Somos</h1>

    <br>
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div id="carouselExampleIndicators2" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>

                </ol>
                <div class="carousel-inner">


                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../web/img/quienessomos/02-vista general.jpg" alt="First slide">
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/Casa.jpg" alt="Second slide">
                    </div>

                </div>

            </div>
        </div>

        <div class="col-md-5 ">
            <br>
            <p style="text-align: justify ; font-size: 1.4rem; font-weight: 300; line-height: 1.2;">El Centro de
                Estudios Che Guevara es la institución encargada de promover el estudio y conocimiento del pensamiento,
                la vida y la obra del comandante Ernesto Che Guevara, ante las actuales y futuras generaciones, tanto
                dentro como fuera de Cuba, por la trascendencia y validez de su legado teórico-práctico y ético, para
                los presentes y nuevos proyectos de emancipación humana.

                Esa labor encuentra expresión en publicaciones, la realización de productos comunicativos y educativos,
                la organización y auspicio de talleres, exposiciones, conferencias y seminarios, acciones de trabajo
                comunitario, o cualquier otra forma que resulte adecuada a estos fines.
            </p>
        </div>


    </div>
</section>
<br>
<br>
<br>
<br>
<br>