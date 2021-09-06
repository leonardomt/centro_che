<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Programacion\Programacion;


use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
use common\models\User;



/* @var $this yii\web\View */
/* @var $model backend\models\Programacion\Programacion */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="producto-audiovisual-form">
    <?php yii\widgets\Pjax::begin(['id' => 'new_producto_audiovisual_update']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

<br><br><br><br><br>

    <div class="row">
        <div  class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-12 text-lg-left">
                                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
                                </div>

                            </div>

                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

                            <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6,'style' => 'resize:none']) ?>


                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('revisar')):?>
                                        <?= $form->field($model, "revisado")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                        <?= $form->field($model, "publico")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?=$form->field($model, 'tipo')->dropDownList(['Fotografía'=>'Fotografía', 'Dibujo Animado'=>'Dibujo Animado', 'Medio Ambiente'=>'Medio Ambiente','Pintura'=>'Pintura','Ajedrez'=>'Ajedrez','Cerámica'=>'Cerámica'],['prompt'=>'-']) ?>
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

