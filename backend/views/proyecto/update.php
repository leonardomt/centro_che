<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyecto\Proyecto */

$this->title = 'Modificar';
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Editorial - Portada', 'url' => ['/proyecto/view', 'id' => 1]];
$this->params['breadcrumbs'][] =$this->title;
?>
<div class="proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>


    <div class="gestion-documental-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'descripcion')->textarea(['rows' => 3, 'maxlength' => 300, 'style' => 'resize:none']) ?>

        <?= $form->field($model, 'enlace')->textarea(['rows' => 1, 'maxlength' => 300, 'style' => 'resize:none']) ?>


        <?= $form->field($modelArchivos, 'file[]')->widget(
            \kartik\file\FileInput::classname(),
            [
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    'showUpload' => false, 'showRemove' => false, 'showCancel' => false,
                    'browseLabel' => '',
                    'maxFileCount' => 5,
                    'removeLabel' => '',
                    'mainClass' => 'input-group-md',
                    'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                    'maxFileSize' => 20048,
                    'msgSizeTooLarge' => 'El archivo supera el límite permitido de <b>20mb</b>.',
                ],

            ]
        ); ?>

        <div class="row panel-heading">
            <div class="col-lg-1"></div>
            <div class="col-lg-5"></div>
            <div class="col-lg-4 "></div>
            <div class="col-lg-1">
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
                </div>
            </div>

        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>
