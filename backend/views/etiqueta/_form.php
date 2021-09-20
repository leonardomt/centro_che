<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Etiqueta\Etiqueta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etiqueta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'etiqueta')->textInput() ?>
    <br><br>
    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">

        </div>
        <div class="col-lg-4 ">

        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style' => "width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
