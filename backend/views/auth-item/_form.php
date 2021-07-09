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
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?=$form->field($model, 'type')->dropDownList(['1' => 'Rol', '0' => 'Permiso'],['prompt'=>'-']) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                                </div>
                            </div>

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


