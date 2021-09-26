<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Articulo\TipoArticulo;


use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\Articulo */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="articulo-form">
    <?php yii\widgets\Pjax::begin(['id' => 'new_articuloupdate']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <div class="row">
        <div  class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
                                </div>

                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <?= $form->field($model, 'fecha')->hiddenInput()->label(false) ?>
                                <div class="col-md-2 ">
                                    <?= $form->field($model, 'year', [
                                        'options' => [

                                            'placeholder' => 'Año',
                                            'mask' => '9999',
                                        ],
                                        'template' => '<span class="col-md-2"><label class="control-label">Año</label>{input}{error}</span>'
                                    ])->input(
                                        'number',
                                        [
                                            'min' => 1800,
                                            'max' => 2035,
                                            'placeholder' => 'Año',
                                        ]
                                    )->label(true) ?>
                                </div>
                                <div class="col-md-2 ">
                                    <?= $form->field($model, "month")->widget(\kartik\select2\Select2::classname(), [
                                            'data' => ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'],
                                            'options' => ['placeholder' => 'Mes', 'multiple' => false],

                                        ]
                                    ) ?>

                                </div>
                                <div class="col-md-2 ">
                                    <?= $form->field($model, 'day', [
                                        'options' => [
                                            'placeholder' => 'Día',
                                        ],
                                        'template' => '<span class=""><label class="control-label">Día</label>{input}{error}</span>'
                                    ])->input(
                                        'number',
                                        [
                                            'min' => 1,
                                            'max' => 31,
                                            'placeholder' => 'Día',
                                        ]
                                    )->label(true) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($model, 'id_tipo_articulo')->dropDownList(
                                        ArrayHelper::map(TipoArticulo::find()->all(), 'id_tipo_articulo','tipo_articulo')) ?>
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


                            <div class="form-group">
                                <?= Html::submitButton('Asignar Multimedia', ['class' => 'btn btn-success',
                                    "onclick" => "actionCreate('$model->id_articulo', '".Url::to(['/articulo-archivo/create',])."')"])
                                ?>
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

