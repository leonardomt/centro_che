<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comentario\Comentario */

$this->title = 'Comentar';
$this->params['breadcrumbs'][] = ['label' => 'Comentario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>


        <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-6 text-lg-left">
                                        <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-6 text-lg-left">
                                        <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
                                    </div>

                                </div>

                                <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>
                                <?=$form->field($model, 'tabla')->hiddenInput(['value' => $tabla])->label(false) ?>
                                <?=$form->field($model, 'id_tabla')->hiddenInput(['value' => $id])->label(false) ?>

                                <br>
                                <div class="row">
                                    <div class="col-lg-6 text-lg-left">
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => 0])->label(false) ?>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>



    <?php ActiveForm::end(); ?>


    <hr class="page_separator"/>


</div>


