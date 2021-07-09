<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Escrito\EscritoArchivo */

$this->title = 'Modificar Escrito Archivo: ' . $model->id_escrito_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Escrito Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_escrito_archivo, 'url' => ['view', 'id' => $model->id_escrito_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escrito-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
