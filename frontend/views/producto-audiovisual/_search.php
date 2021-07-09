<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductoAudiovisual\ProductoAudiovisualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-audiovisual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <?php // echo $form->field($model, 'id_archivo') ?>
        <div class="col-md-1">
            <?=$form->field($model, 'revisado')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'publico')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'titulo') ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'autor') ?>
        </div>
        <div class="col-md-3">
            <?php  echo $form->field($model, 'descripcion') ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
