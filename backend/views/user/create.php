<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \backend\models\User\User */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>



    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="row">
                <div class="col-lg-6 text-lg-left">
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-lg-6 text-lg-left">
                    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 text-lg-left">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-lg-6 text-lg-left">
                    <?= $form->field($model, 'new_password')->passwordInput() ?>
                </div>
            </div>

            <?= $form->field($model, 'email') ?>



            <div class="row">
                <div class="col-md-11"></div>
                <div class="form-group">
                    <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
