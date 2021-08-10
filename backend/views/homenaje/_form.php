<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use backend\models\Homenaje\TipoHomenaje;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Homenaje\Homenaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homenaje-form">

    <?php $form = ActiveForm::begin(); ?>


    <br><br><br><br><br>

    <div class="row">
        <div  class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'id_tipo_homenaje')->dropDownList(
                                        ArrayHelper::map(TipoHomenaje::find()->all(), 'id_tipo_homenaje','tipo_homenaje')) ?>
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

