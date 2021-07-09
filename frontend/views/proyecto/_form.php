<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Proyecto\Proyecto;


use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
use common\models\User;



/* @var $this yii\web\View */
/* @var $model backend\models\Proyecto\Proyecto */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(

    '$("document").ready(function(){

$("#new_articuloupdate").on("pjax:end", function() {

$.pjax.reload({container:"#articuloupdate"});  

});

});'

);



?>

<div class="proyecto-form">
    <?php yii\widgets\Pjax::begin(['id' => 'new_proyectoupdate']) ?>
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

                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?=$form->field($model, 'revisado')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                    <?=$form->field($model, 'publico')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>
                                    <?php endif; ?>
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

