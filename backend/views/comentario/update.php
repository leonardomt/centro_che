<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Comentario\Comentario */

$this->title = 'Revisar Comentario: ';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comentario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'fecha')->textInput(['readonly' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>
        </div>
    </div>
    <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6, 'readonly' => !$model->isNewRecord]) ?>

    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'tabla')->textInput(['readonly' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'id_tabla')->textInput(['readonly' => !$model->isNewRecord]) ?>
        </div>
    </div>

    <hr class="page_separator"/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <?= $form->field($model, "publico")->checkbox(); ?>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
