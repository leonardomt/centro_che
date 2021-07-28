<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Homenaje\TipoHomenaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-homenaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <br><br><br><br><br>

    <div class="row">
        <div  class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <?= $form->field($model, 'tipo_homenaje')->textInput() ?>

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

