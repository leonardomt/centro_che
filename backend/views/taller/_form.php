<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Taller\Taller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taller-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <div class="row">
        <div  class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'nombre')->textInput() ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'encargado')->textInput() ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'contacto')->textInput() ?>

                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

                            <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6,'style' => 'resize:none']) ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                        <?= $form->field($model, "publico")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                   <?=$form->field($model, 'tipo')->dropDownList(['Fotografía'=>'Fotografía', 'Dibujo Animado'=>'Dibujo Animado', 'Medio Ambiente'=>'Medio Ambiente','Pintura'=>'Pintura','Ajedrez'=>'Ajedrez','Cerámica'=>'Cerámica'],['prompt'=>'-']) ?>
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

