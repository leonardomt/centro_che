<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductoAudiovisual\ProductoAudiovisualArchivo */

$this->title = 'Modificar Producto Audiovisual Archivo: ' . $model->id_producto_audiovisual;
$this->params['breadcrumbs'][] = ['label' => 'Producto Audiovisual Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto_audiovisual, 'url' => ['view', 'id' => $model->id_producto_audiovisual]];
$this->params['breadcrumbs'][] = 'Modificar';
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="producto-audiovisual-archivo-update col-md-12">

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
