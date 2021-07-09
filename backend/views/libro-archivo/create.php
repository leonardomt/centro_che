<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Libro\LibroArchivo */

$this->title = 'Create Libro Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Libro Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
