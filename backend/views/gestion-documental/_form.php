<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumental */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gestion-documental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-11"></div>
        <div class="form-group">
            <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
