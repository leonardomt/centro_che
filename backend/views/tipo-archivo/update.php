<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\TipoArchivo */

$this->title = 'Update Tipo Archivo: ' . $model->id_tipo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_archivo, 'url' => ['view', 'id' => $model->id_tipo_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-archivo-update col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
