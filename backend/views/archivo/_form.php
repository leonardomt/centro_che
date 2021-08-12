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

        <div class="col-md-6 ">
            <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(), [
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'descripcion_archivo')->textarea(['rows' => 3, 'maxlength' => 3000,'style' => 'resize:none']) ?>




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

        <div class="col-md-10">
            <?php if (Yii::$app->user->can('revisar')) : ?>
                <?= $form->field($model, "revisado")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-2 ">
            <div class="form-group">
                <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>