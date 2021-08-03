<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Comentario\Comentario */

$this->title = 'Responder como Institución';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$comentario = \backend\models\Comentario\Comentario::find()->where(['id'=> $id])->one();
?>
<div class="comentario-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 3]) ?>

    <?=$form->field($model, 'tabla')->hiddenInput(['value' => $comentario->tabla])->label(false) ?>
    <?=$form->field($model, 'id_tabla')->hiddenInput(['value' => $comentario->id_tabla])->label(false) ?>

    <?=$form->field($model, 'publico')->hiddenInput(['value' => 1])->label(false) ?>
    <?=$form->field($model, 'revisado')->hiddenInput(['value' => 1])->label(false) ?>


    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
        </div>
        <div class="col-lg-4 ">
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>



</div>
