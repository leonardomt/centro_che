<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Libro\LibroArchivo */

$this->title = 'Update Libro Archivo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Libro Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="libro-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
