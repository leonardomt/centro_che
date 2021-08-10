<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Articulo\ArticuloComentario;
use backend\models\Articulo\Articulo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Comentario\Comentario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-comentario-form">

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <div class="row">
        <div  class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-lg-6 text-lg-left">
                                    <?php $id_insert=$id;?>
                                    <?=$form->field($model, 'id_articulo')->hiddenInput(['value' => $id_insert])->label(false) ?>
                                </div>
                            </div>

                            <?= $form->field($model, 'comentario')->textarea(['rows' => 6,'style' => 'resize:none']) ?>
                            <?=$form->field($model, 'fecha')->hiddenInput(['value' => date('yy-m-d')])->label(false) ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?php $x=0;?>
                                    <?=$form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>

                                </div>
                            </div>


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


