<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Etiqueta\EtiquetaColeccionDocumental */

$this->title = 'Create Etiqueta Coleccion Documental';
$this->params['breadcrumbs'][] = ['label' => 'Etiqueta Coleccion Documentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiqueta-coleccion-documental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
