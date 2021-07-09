<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Otros\OtrosArchivo */

$this->title = 'Update Otros Archivo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Otros Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="otros-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
