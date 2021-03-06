<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\QuienesArchivo */

$this->title = 'Update Quienes Archivo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quiénes Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quienes-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
