<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\TestimonioArchivo */

$this->title = 'Update Testimonio Archivo: ' . $model->id_testimonio_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Testimonio Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_testimonio_archivo, 'url' => ['view', 'id' => $model->id_testimonio_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testimonio-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
