<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\ArticuloArchivo */

$this->title = 'Modificar Articulo-Archivo: ' . $model->id_articulo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Articulo-Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proyecto_archivo, 'url' => ['view', 'id' => $model->id_articulo_archivo]];
$this->params['breadcrumbs'][] = 'Modificar';
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="articulo-archivo-update col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
