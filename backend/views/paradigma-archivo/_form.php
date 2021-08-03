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
                    'showUpload' => false,
                    'browseLabel' => 'Insertar Imagen',
                    'removeLabel' => '',
                    'mainClass' => 'input-group-md'
                ],

            ]
        );
    }; ?>

    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
        </div>
        <div class="col-lg-4 ">
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>