<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeria\GaleriaVO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeria-vo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_archivo')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'publico')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
