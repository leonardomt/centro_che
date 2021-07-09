<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\DiscursoArchivo */

$this->title = 'Update Discurso Archivo: ' . $model->id_discurso_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Discurso Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_discurso_archivo, 'url' => ['view', 'id' => $model->id_discurso_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discurso-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
