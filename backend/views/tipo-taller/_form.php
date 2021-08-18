<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Taller\TipoTaller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->textInput() ?>


    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">

        </div>
        <div class="col-lg-4 ">

        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>

    </div>



    <?php ActiveForm::end(); ?>

</div>
