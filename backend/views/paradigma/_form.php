<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Revista\Paradigma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paradigma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3, 'maxlength' => 300,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'enlace')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
