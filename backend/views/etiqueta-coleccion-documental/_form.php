<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Etiqueta\EtiquetaColeccionDocumental */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etiqueta-coleccion-documental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_etiqueta')->textInput() ?>

    <?= $form->field($model, 'id_coleccion_documental')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
