<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Revista\ParadigmaArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paradigma-archivo-form">

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

    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
        </div>
        <div class="col-lg-4 ">
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>