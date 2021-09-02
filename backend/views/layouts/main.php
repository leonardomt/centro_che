<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;


$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'img/logo/che_negativo.png']);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>


    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css" <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">

        <body class="skin-green">
            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the messages -->
                                        <ul class="menu">
                                            <li>
                                                <!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <!-- User Image -->
                                                        <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <!-- Message title and timestamp -->
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <!-- The message -->
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                        </ul>
                                        <!-- /.menu -->
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- /.messages-menu -->

                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <li>
                                                <!-- start notification -->
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <!-- end notification -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks Menu -->
                            <li class="dropdown tasks-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- Inner menu: contains the tasks -->
                                        <ul class="menu">
                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                   
                                            </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </body>
        <div class="page-wrapper default-theme sidebar-bg bg1 toggled">
            <nav id="sidebar" class="sidebar-wrapper">
                <br><br><br>
                <div class="sidebar-content">
                    <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                        <div class="user-info">
                            <span>Menú</span>
                        </div>
                    </div>

                    <!-- sidebar-menu  -->
                    <div class=" sidebar-item sidebar-menu">
                        <ul>
                            <li>
                                <?php if (Yii::$app->user->can('gestionar-archivo')) : ?>
                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=archivo">
                                        <span class="fa fa-icons"></span>
                                        <span class="menu-text"> &nbsp; Archivos </span>
                                    </a>
                                <?php endif; ?>

                            </li>


                            <?php

                            if (Yii::$app->user->can('gestionar-noticia')) :

                            ?>
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-list"></span>
                                        <span class="menu-text"> &nbsp; Inicio</span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=noticia">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Actualidad </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=carrusel">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Carrusel </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="https://www.google.com/maps/d/edit?hl=es&mid=1UQQMw-m_DPTKOJPfYTs3ZkFBobP39SBE&ll=22.21037405686551%2C-80.85830277278139&z=8">
                                                        <span class="fa fa-map-marker" aria-hidden="true"></span>
                                                        <span class="menu-text"> &nbsp;Mapa </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=paradigma%2Fview&id=1">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Paradigma </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>



                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=quienes%2Fview&id=1">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Quiénes Somos </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=contacto%2Fview&id=1">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Contacto </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-noticia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=trabajador">
                                                        <span class="fa fa-icons"></span>
                                                        <span class="menu-text"> &nbsp;Equipo de Trabajo </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>


                            <?php

                            if (
                                Yii::$app->user->can('gestionar-articulo') || Yii::$app->user->can('gestionar-coleccion-documental') ||
                                Yii::$app->user->can('gestionar-investigacion') || Yii::$app->user->can('gestionar-proyecto') ||
                                Yii::$app->user->can('gestionar-curso-online')
                            ) :

                            ?>
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-list"></span>
                                        <span class="menu-text"> &nbsp; Coordinación Académica</span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <?php if (Yii::$app->user->can('gestionar-linea-investigacion')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=linea-investigacion">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Líneas de Investigación </span>
                                                    </a>
                                                </li><?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-investigacion')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=investigacion">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Investigaciones </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-articulo')) : ?>
                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=articulo">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Artículos </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (Yii::$app->user->can('gestionar-coleccion-documental')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=gestion-documental%2Fview&id=1">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Colección Documental </span>
                                                    </a>
                                                </li><?php endif; ?>





                                            <?php if (Yii::$app->user->can('gestionar-proyecto')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=proyecto%2Fview&id=1">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Proyecto Editorial </span>
                                                    </a>
                                                </li><?php endif; ?>



                                            <?php if (Yii::$app->user->can('gestionar-curso-online')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=curso-online">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp;Cursos Online </span>
                                                    </a>
                                                </li><?php endif; ?>



                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>


                            <?php
                            if (
                                Yii::$app->user->can('gestionar-exposicion') || Yii::$app->user->can('gestionar-noticia') ||
                                Yii::$app->user->can('gestionar-taller') || Yii::$app->user->can('gestionar-producto-audiovisual')
                            ) :
                            ?>
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-list"></span>
                                        <span class="menu-text">&nbsp; Proyectos Alternativos </span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>

                                            <?php if (Yii::$app->user->can('gestionar-taller')) : ?>
                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=taller">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Proyectos Comunitarios </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-exposicion')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=exposicion">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Programación Cultural </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-exposicion')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=exposicion">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Exposiciones </span>
                                                    </a>
                                                </li><?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-producto-audiovisual')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=producto-audiovisual">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Productos Audiovisuales </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-exposicion')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=otros">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Otros </span>
                                                    </a>
                                                </li><?php endif; ?>






                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if (
                                Yii::$app->user->can('gestionar-correspondencia') ||
                                Yii::$app->user->can('gestionar-hecho') || Yii::$app->user->can('gestionar-homenaje')
                            ) :
                            ?>
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-list"></span>
                                        <span class="menu-text">&nbsp; Vida y Obra </span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>

                                            <?php if (Yii::$app->user->can('gestionar-hecho')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=hecho">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Cronología </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-correspondencia')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=correspondencia">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Correspondencia </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-escrito')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=escrito">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Escritos </span>
                                                    </a>
                                                </li><?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-discurso')) : ?>
                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=discurso">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Discursos y Entrevistas </span>
                                                    </a>
                                                </li><?php endif; ?>


                                            <?php if (Yii::$app->user->can('gestionar-testimonio')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=testimonio">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Testimonios </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-galeriavo')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=galeria-v-o%2Findex&tipo=1">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Fotografía </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-galeriavo')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=galeria-v-o%2Findex&tipo=2">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Audio </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-galeriavo')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=galeria-v-o%2Findex&tipo=3">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Video </span>
                                                    </a>
                                                </li><?php endif; ?>

                                            <?php if (Yii::$app->user->can('gestionar-galeriavo')) : ?>

                                                <li>
                                                    <a href="<?php echo Yii::$app->homeUrl ?>?r=galeria-v-o%2Findex&tipo=4">
                                                        <span class="glyphicon glyphicon-list"></span>
                                                        <span class="menu-text"> &nbsp; Homenaje </span>
                                                    </a>
                                                </li><?php endif; ?>





                                        </ul>
                                    </div>
                                </li>

                            <?php endif; ?>


                            <?php if (Yii::$app->user->can('gestionar-usuarios')) : ?>

                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="fa fa-indent"></span>
                                        <span class="menu-text">&nbsp; Administración </span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="<?php echo Yii::$app->homeUrl ?>?r=user">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <span class="menu-text"> &nbsp; Usuarios </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo Yii::$app->homeUrl ?>?r=auth-item">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <span class="menu-text"> &nbsp;Roles </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?php echo Yii::$app->homeUrl ?>?r=tipo-taller">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <span class="menu-text"> &nbsp; Tipos de Proyectos Comunitarios </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo Yii::$app->homeUrl ?>?r=tipo-producto">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <span class="menu-text"> &nbsp; Géneros de Productos Audiovisuales </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                            <?php endif; ?>


                            <?php if (Yii::$app->user->can('gestionar-comentario')) : ?>

                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        <span class="menu-text">&nbsp; Comentarios </span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="<?php echo Yii::$app->homeUrl ?>?r=comentario">
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <span class="menu-text"> &nbsp; Comentarios </span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>

                            <?php endif; ?>


                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                    <br><br><br>
                </div>

            </nav>
            <!-- page-content  -->
            <main class="page-content pt-2 col-md-10">
                <div id="overlay" class="overlay col-md-10"></div>
                <div class="container-fluid p-5 ">

                    <?= $content ?>
                </div>

            </main>
            <!-- page-content" -->
        </div>


    </div>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>