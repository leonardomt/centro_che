<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\ArticuloArchivo */

$this->title = 'Modificar Artículo-Archivo: ' . $model->id_articulo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'ArticuloArchivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_articulo_archivo, 'url' => ['view', 'id' => $model->id_articulo_archivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articulo-archivo-update col-md-12">

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
