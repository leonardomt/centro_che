<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Trabajador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'area')->dropDownList(['Dirección' => 'Dirección', 'Coordinación Académica' => 'Coordinación Académica', 'Coordinación de Proyectos Alternativos' => 'Coordinación de Proyectos Alternativos']) ?>




    <div class="form-group">
        <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>