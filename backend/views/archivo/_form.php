<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Archivo\TipoArchivo;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="archivo-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">

        <div class="col-md-12">
            <?= $form->field($model, 'titulo_archivo')->textInput(['maxlength' => true]) ?>
        </div>

    </div>


    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'autor_archivo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'etiqueta')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'fuente')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 ">
            <?= $form->field($model, 'year')->textInput(
                [
                    'type' => 'number',
                    'min' => 1800,
                    'max' => date('Y'),
                    'placeholder' => 'Año',
                ]
            ) ?>
        </div>
        <div class="col-md-2 ">
            <?= $form->field($model, "month")->widget(\kartik\select2\Select2::classname(), [
                    'data' => ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'],
                    'options' => ['placeholder' => 'Mes', 'multiple' => false],

                ]
            ) ?>

        </div>
        <div class="col-md-2 ">
            <?= $form->field($model, 'day')->textInput(
                [
                    'type' => 'number',
                    'min' => 1,
                    'max' => 31,
                    'placeholder' => 'Día',
                ]
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'descripcion_archivo')->textarea(['rows' => 3, 'maxlength' => 3000, 'style' => 'resize:none']) ?>




    <?php if ($model->isNewRecord) { ?>

        <?= $form->field($model, 'file')->widget(
            \kartik\file\FileInput::classname(),
            [
                'pluginOptions' => [
                    'showUpload' => false,
                    'browseLabel' => '',
                    'showCancel' => false,
                    'showRemove' => false,
                    'mainClass' => 'input-group-md',
                    'allowedFileExtensions' => ['png', 'jpg', 'gif', 'jpeg', 'mp4', 'mp3'],
                    'maxFileSize' => 20048,
                    'msgSizeTooLarge' => 'El archivo supera el límite permitido de <b>20mb</b>.',

                ],

            ]
        ); ?>
    <?php }; ?>


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <?php if (Yii::$app->user->can('revisar')) : ?>
                <?= $form->field($model, "revisado")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-2 ">
            <div class="form-group">
                <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style' => "width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>

        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<style>
    .form-control.is-valid, .was-validated .form-control:valid {
        padding-right: 0.75rem;
    }
    .form-control.is-invalid, .was-validated .form-control:invalid {
        padding-right: 0.75rem;
    }
</style>