<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrusel\Carrusel */

$this->title = 'Insertar imagen del carrusel';
$this->params['breadcrumbs'][] = ['label' => 'Carrusel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrusel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
