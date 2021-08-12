<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Carrusel\Carrusel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrusel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord) { ?>

        <?= $form->field($model, 'file')->widget(
            \kartik\file\FileInput::classname(),
            [
                'pluginOptions' => [
                    'showUpload' => false,'showRemove' => false,'showCancel' => false,
                    'browseLabel' => 'Insertar Imagen',
                    'removeLabel' => '',
                    'mainClass' => 'input-group-md',
                     'allowedFileExtensions' => ['png', 'jpg', 'gif', 'jpeg'],
                    'maxFileSize' => 20048,
                    'msgSizeTooLarge' => 'El archivo supera el límite permitido de <b>20mb</b>.',
                ],

            ]
        ); }; ?>

<div class="row">
<div class="col-md-11"></div>
    <div class="form-group">
        <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>