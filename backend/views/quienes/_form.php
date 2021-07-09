<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Quienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quienes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
