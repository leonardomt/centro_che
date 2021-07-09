<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\TipoArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_articulo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
