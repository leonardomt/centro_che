<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'img/logo/che_negativo.png']);
AppAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <link href="/centro_che/frontend/web/css/Animate.css_files/animate.min.css" rel="stylesheet">

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top my-navbar-color" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand "  href="<?= Yii::$app->homeUrl; ?>"><img class="che_nav_logo" src="img/logo/che_positivo-01.png"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

        <?= $content ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
$(document).scroll(function(e){ var scrollTop = $(document).scrollTop(); if(scrollTop > 0){ console.log(scrollTop); $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top'); } else { $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top'); } });
</script>