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
$nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
$este = $nombre->first_name . " " . $nombre->last_name;
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

    <?= $form->field($model, 'alias')->dropDownList([ $este => $este, 'Centro Che Cuba' => 'Centro Che Cuba', 'Administrador'=>'Administrador', 'Administradora'=>'Administradora', 'Coordinación Académica'=>'Coordinación Académica', 'Coordinación de Proyectos Alternativos'=>'Coordinación de Proyectos Alternativos', 'Investigador'=>'Investigador', 'Invesigadora'=>'Invesigadora', 'Especialista'=>'Especialista']) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 3,'style' => 'resize:none']) ?>

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
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>



</div>
