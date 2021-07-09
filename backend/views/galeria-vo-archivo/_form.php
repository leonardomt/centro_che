<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeria\GaleriaVoArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeria-vo-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_galeria_vo')->textInput() ?>

    <?= $form->field($model, 'id_archivo')->textInput() ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
