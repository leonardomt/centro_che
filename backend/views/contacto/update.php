<?php

use yii\helpers\Html;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Contacto */

$this->title = 'Modificar Información de  Contacto: ';
$this->params['breadcrumbs'][] = ['label' =>  'Contacto', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="contacto-update">

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
