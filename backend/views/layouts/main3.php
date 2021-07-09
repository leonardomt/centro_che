<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
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

        <?php
        NavBar::begin([
            'brandLabel' => '<img class="che_nav_logo" src="../web/img/logo/che_positivo-01.png">',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top my-navbar',
            ],
        ]);
        $menuItems = [];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
            $menuItems[] = ['label' => $nombre->first_name . " " . $nombre->last_name];
            $menuItems[] = ['label' => 'Logout', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post'],];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);



        NavBar::end();
        ?>
        <br><br><br>
        <?= \hail812\adminlte\widgets\Alert::widget([
            'type' => 'success',
            'body' => '<h3>Congratulations!</h3>'
        ]) ?>

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