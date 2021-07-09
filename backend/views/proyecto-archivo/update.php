<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyecto\ProyectoArchivo */

$this->title = 'Update Proyecto Archivo: ' . $model->id_proyecto_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proyecto_archivo, 'url' => ['view', 'id' => $model->id_proyecto_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyecto-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
