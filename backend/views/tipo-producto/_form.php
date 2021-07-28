<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductoAudiovisual\TipoProducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_producto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
