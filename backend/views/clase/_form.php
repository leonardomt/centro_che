<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\Clase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clase-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'enlace')->textInput() ?>
        </div>
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'profesor')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3,'style' => 'resize:none']) ?>

    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <?php if (Yii::$app->user->can('revisar')) : ?>
                <?= $form->field($model, "revisado")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 ">
            <?php if (Yii::$app->user->can('publicar')) : ?>
                <?= $form->field($model, "publico")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-primary', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
