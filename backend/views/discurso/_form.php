<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\Discurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discurso-form">




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
                                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(),[
                                        'inline'=>false,'language' => 'es', 'options' => [
                                            'autocomplete' => 'off',
                                        ],
                                        'clientOptions' => [
                                            'autoclose'=> true,
                                            'format' => 'yyyy-m-d',
                                            'endDate' => date('Y-m-d'),
                                        ]
                                    ]) ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'lugar')->textInput() ?>

                            <?= $form->field($model, 'medio')->textInput() ?>

                            <?= $form->field($model, 'entrevistador')->textInput() ?>

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
                                <?= Html::submitButton('Siguiente', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php ActiveForm::end(); ?>




</div>
