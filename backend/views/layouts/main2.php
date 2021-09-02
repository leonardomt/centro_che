<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use \backend\themes\modern\AppAssetModern;
use \backend\models\User\User;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

AppAssetModern::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Gestión Sitio Che </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"></link>

    <script>

        var urlhome='<?php echo Yii::$app->homeUrl ?>';
        var _csrf='<?php echo Yii::$app->getRequest()->csrfToken ?>'
            <?php if( !Yii::$app->user->isGuest):?>
            var id_user=<?php echo Yii::$app->getUser()->identity->first_name ?>;
            <?php endif; ?>
    </script>
    <?php $this->head() ?>



    <style>
        .actions{
            margin-left: 20px
        }
    </style>
</head>

<body class="page-header-fixed">
<?php $this->beginBody() ?>
<div class="overlay"></div>
<form class="search-form" action="#" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Buscar...">
        <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
    </div><!-- Input Group -->
</form><!-- Search Form -->
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <div class="logo-box">
                <a class="logo-text"><span></span></a>
            </div><!-- Logo Box -->

            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>



                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li >
                            <a href="#" >
                                <?php if( !Yii::$app->user->isGuest):?>
                                <?php $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one(); ?>
                                    <span class="user-name"><?php echo $nombre->first_name." ".$nombre->last_name ?>  </span>
                                <?php else: $nombre = "Invitado";
                                ?>
                                    <span class="user-name"><?php echo $nombre ?>   </span>
                                <?php
                                endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"  class="btnlogout log-out waves-effect waves-button waves-classic">
                                <?php if( !Yii::$app->user->isGuest):?>
                                    <?php
                                    echo Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                            '<span class="fa fa-sign-out pr5"></span>' . Yii::t('app', 'Salir'), ['class' => 'btn-link']
                                        )
                                        . Html::endForm()
                                    ?>
                                <?php else: ?>
                                <span ><i class="fa fa-log-in btn btn-link login m-r-xs"></i>Autenticarse</span>
                                <?php endif; ?>
                            </a>
                        </li>
                        
                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar ">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="firma_side_bar">
                </div>
            </div>
            <ul class="menu accordion-menu">

                <!--
                <li class="active"><a href="<?php echo Yii::$app->homeUrl?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Inicio</p></a></li>
                <li class="droplink"><a href="../../../../modules/indicadores/indicadoresModule.php" class="waves-effect waves-button"><span class="menu-icon icon-shield"></span><p>Seguridad</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo Yii::$app->homeUrl?>seguridad/user_rbac">Usuario</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>seguridad/role">Rol</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>seguridad/actions_rbac">Acciones</a></li>


                    </ul>
                </li>
                -->

                <li class="droplink"><a href="" class="waves-effect waves-button"><span class="menu-icon glyphicon icon-list"></span><p>Gestión</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=articulo">Artículos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=tipo-articulo">Tipos de Artículos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=coleccion-documental">Colecciones Documentales</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=correspondencia">Correspondencia</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=curso-online">Cursos Online</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=exposicion">Exposiciones</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=hecho">Hechos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=homenaje">Homenajes</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=tipo-homenaje">Tipos de Homenajes</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=investigacion">Investigaciones</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=linea-investigacion">Lineas de Investigación</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=noticia">Noticias</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=revista">Revistas</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=taller">Talleres</a></li>



                    </ul>
                </li>

                <li class="droplink"><a href="" class="waves-effect waves-button"><span class="menu-icon glyphicon icon-picture"></span><p>Archivos</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=archivo">Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=articulo-archivo">Articulos Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=coleccion-documental-archivo">Colección Documental Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=correspondencia-archivo">Correspondencia Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=curso-online-archivo">Curso Online Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=exposicion-archivo">Exposición Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=hecho-archivo">Hecho Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=homenaje-archivo">Homenaje Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=investigacion-archivo">Investigación Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=linea-investigacion-archivo">Línea de Investigación Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=noticia-archivo">Noticia Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=revista-archivo">Revista Archivos</a></li>
                        <li><a href="<?php echo Yii::$app->homeUrl?>?r=taller-archivo">Taller Archivos</a></li>


                    </ul>

                </li>






            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->
    <br>

    <div class="page-inner">
        <?= $content ?>
        <div class="page-footer">
            <p class="no-s">2020 Plataforma Web Colaborativa "Centro de Estudios Che Guevara".

        </div>
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<nav class="cd-nav-container" id="cd-nav">
    <header>
        <h3>Navigation</h3>
        <a href="#" class="cd-close-nav">Close</a>
    </header>
</nav>


<?php $this->endBody() ?>
</body>

<?php $this->endPage() ?>
