<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\QuienesDetalle */

$this->title = 'Modificar Descripción ';
$this->params['breadcrumbs'][] = ['label' => 'Quiénes Somos - Detalles', 'url' => ['/quienes-detalle/view', 'id' => 1]];
$this->params['breadcrumbs'][] =$this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-inicio'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="quienes-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <div class="quienes-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'descripcion')->textarea(['rows' => 3, 'style' => 'resize:none']) ?>



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
