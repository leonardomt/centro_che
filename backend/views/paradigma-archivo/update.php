<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Revista\ParadigmaArchivo */

$this->title = 'Update Paradigma Archivo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paradigma Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paradigma-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
