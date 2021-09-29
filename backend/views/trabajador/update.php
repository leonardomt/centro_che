<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Trabajador */

$this->title = 'Modificar información del Trabajador: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Quiénes Somos - Detalles', 'url' => ['/quienes-detalle/view', 'id' => 1]];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';

if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-inicio'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="trabajador-update">

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
