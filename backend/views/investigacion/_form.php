<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use backend\models\LineaInvestigacion\LineaInvestigacion;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Investigacion\Investigacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="investigacion-form">

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
                                    <?= $form->field($model, 'titulo_investigacion')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'autor')->textInput() ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'id_linea_investigacion')->dropDownList(
                                ArrayHelper::map(LineaInvestigacion::find()->all(), 'id_linea_investigacion','nombre_linea')

                            ) ?>
                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 2]) ?>

                            <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>

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
