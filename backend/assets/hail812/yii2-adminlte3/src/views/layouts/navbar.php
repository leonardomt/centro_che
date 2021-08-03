<?php

use yii\helpers\Html;

?>

<!-- Navbar -->
<link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css" <meta charset="<?= Yii::$app->charset ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item d-none d-sm-inline-block" >
            <?php if ( !Yii::$app->user->isGuest ): ?>
                <?php $nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();?>
                <a href="#" class="nav-link" ><?= $nombre->first_name . " " . $nombre->last_name;?></a>
            <?php endif; ?>
        </li>
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt" style="color:white"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color:white">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->