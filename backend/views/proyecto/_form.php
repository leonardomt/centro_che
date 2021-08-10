<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyecto\Proyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'enlace')->textarea(['rows' => 1,'style' => 'resize:none']) ?>

    <div class="row">
        <div class="col-md-11"></div>
        <div class="form-group">
            <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
