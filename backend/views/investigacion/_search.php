<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Investigacion\InvestigacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="investigacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_investigacion') ?>

    <?= $form->field($model, 'revisado') ?>

    <?= $form->field($model, 'publico') ?>

    <?= $form->field($model, 'titulo_investigacion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'autor') ?>

    <?php // echo $form->field($model, 'id_linea_investigacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
