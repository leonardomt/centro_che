<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\User\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>


    <br>

    <div class="row">
        <div  class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <?= $form->field($model, 'type')->hiddenInput(['value' => 1])->label(false) ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                                </div>
                            </div>
                            <?= $form->field([$modelChild], "child")->widget(\kartik\select2\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\User\AuthItem::find()->where(['type'=> 2])->all(), 'name', 'name'),
                                    'options' => ['placeholder' => 'Seleccionar', 'multiple' => true, 'required' => true],
                                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                                    'size' => 'xs',]
                            ) ?>

                                <div class="row">
                            <div class="form-group ">
                                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                            </div>
                                </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php ActiveForm::end(); ?>


