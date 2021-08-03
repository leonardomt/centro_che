<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Contacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'telefono1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telefono2')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
    
    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
        </div>
        <div class="col-lg-4 ">
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>