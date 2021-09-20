<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Etiqueta\EtiquetaColeccionDocumental */

$this->title = 'Update Etiqueta Coleccion Documental: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Etiqueta Coleccion Documentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etiqueta-coleccion-documental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
