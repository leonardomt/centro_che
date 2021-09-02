<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Correspondencia\Correspondencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correspondencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div  class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">

                                    <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(),[
                                        'inline'=>false, 'language' => 'es', 'options' => [
                                            'readonly' => 'readonly'
                                        ],
                                        'clientOptions' => [
                                            'autoclose'=> true,
                                            'format' => 'yyyy-m-d',
                                            'endDate' => date('Y-m-d'),
                                        ]
                                    ]) ?>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'destinatario')->textInput() ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'remitente')->textInput() ?>
                                </div>
                            </div>

                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>
        
                            <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6,'style' => 'resize:none']) ?>
                            
                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('revisar')):?>
                                        <?= $form->field($model, "revisado")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                        <?= $form->field($model, "publico")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="form-group">
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


