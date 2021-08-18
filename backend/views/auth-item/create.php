<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\User\AuthItem */

$this->title = 'Crear Rol';
$this->params['breadcrumbs'][] = ['label' => 'Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="auth-item-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>


    <br>

    <div class="row">
        <div  class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <?= $form->field($model, 'type')->hiddenInput(['value' => 1])->label(false) ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'description')->textarea(['rows' => 2,'style' => 'resize:none']) ?>
                                </div>
                            </div>
                            <?= $form->field($model, "rol")->widget(\kartik\select2\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\User\AuthItem::find()->where(['type'=> 2])->all(), 'name', 'name'),
                                    'options' => ['placeholder' => 'Seleccionar', 'multiple' => true, 'required' => true],
                                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                                    'size' => 'xs',]
                            ) ?>

                            <div class="row">
                                <div class="col-md-11"></div>
                                <div class="form-group">
                                    <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
