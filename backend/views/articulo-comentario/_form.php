<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Articulo\ArticuloComentario;
use backend\models\Articulo\Articulo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\ArticuloComentario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-comentario-form">
    <?php yii\widgets\Pjax::begin(['id' => 'new_articulocomentarioupdate']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <br><br><br><br><br>

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

                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(),[
                                        'inline'=>false,
                                        'clientOptions' => [
                                            'autoclose'=> true,
                                            'format' => 'yyyy-m-d'
                                        ]
                                    ]) ?>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'id_articulo')->dropDownList(
                                        ArrayHelper::map(Articulo::find()->all(), 'id_articulo','titulo')) ?>
                                </div>
                            </div>

                            <?= $form->field($model, 'comentario')->textarea(['rows' => 6,'style' => 'resize:none']) ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?=$form->field($model, 'revisado')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                        <?=$form->field($model, 'publico')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
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
<?php yii\widgets\Pjax::end() ?>

