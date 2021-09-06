<?php

use backend\models\Investigacion\Investigacion;
use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\Articulo */

$this->title = 'Crear Artículo';
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));


?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .stretch-card>.card {
        width: 100%;
        min-width: 100%
    }

    body {
        background-color: #f9f9fa
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width:991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 3rem
    }

    .card {
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #3da5f;
        border-radius: 0
    }

    .card .card-body {
        padding: 1.25rem 1.75rem
    }

    .card .card-title {
        color: #000000;
        margin-bottom: 0.625rem;
        text-transform: capitalize;
        font-size: 0.875rem;
        font-weight: 500
    }

    .card .card-description {
        margin-bottom: .875rem;
        font-weight: 400;
        color: #76838f
    }

    .form-group label {
        font-size: 0.875rem;
        line-height: 1.4rem;
        vertical-align: top;
        margin-bottom: .5rem
    }

    .form-control {
        border: 1px solid #f3f3f3;
        font-weight: 400;
        font-size: 0.875rem
    }
</style>
<script type='text/javascript'
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" xmlns=""></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script type='text/javascript' src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<div class="articulo-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-5 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form input mask example</h4>
                            <p class="card-description">Take a preview of input mask format</p>
                            <form class="forms-sample">
                                <div class="form-group row">
                                    <div class="col"> <label>Date:</label> <input class="form-control" data-inputmask="'alias': 'date'"> </div>
                                    <div class="col"> <label>Date time:</label> <input class="form-control" data-inputmask="'alias': 'datetime'"> </div>
                                </div>
                                <div class="form-group"> <label>Date with custom placeholder:</label> <input class="form-control" data-inputmask="'alias': 'date','placeholder': '*'"> </div>
                                <div class="form-group"> <label>Phone:</label> <input class="form-control" id="phone" data-inputmask="'alias': 'phonebe'"> </div>
                                <div class="form-group"> <label>Currency:</label> <input class="form-control" data-inputmask="'alias': 'currency'" style="text-align: right;"> </div>
                                <div class="form-group row">
                                    <div class="col"> <label>Email:</label> <input class="form-control" data-inputmask="'alias': 'email'"> </div>
                                    <div class="col"> <label>Ip:</label> <input class="form-control" data-inputmask="'alias': 'ip'"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--form mask ends-->
                </div>
            </div>
        </div>
        <!--form mask ends-->
    </div>




    <?php $form = kartik\form\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-lg-12 text-lg-left">
            <?= $form->field($model, 'autor')->textInput() ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(), [
                'inline' => false, 'language' => 'es', 'options' => [
                    'data-inputmask'=>"'alias': 'date'",
                    'autocomplete' => 'off',
                ],
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d',
                    'endDate' => date('Y-m-d'),
                ]
            ]) ?>
        </div>
    </div>






    <?=
    $form->field($model, 'id_investigacion')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Investigacion::find()->all(), 'id_investigacion', 'titulo_investigacion'),
        'options' => ['placeholder' => 'Seleccionar', 'multiple' => false, 'required' => true],
        'theme' => \kartik\select2\Select2::THEME_KRAJEE,
        'size' => 'xs',]
    ) ?>

    <?= $form->field($model, 'resumen')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'palabras_clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abstract')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6,'style' => 'resize:none']) ?>





    <div class="panel panel-default">

        <div class="panel-body">
            <?php \wbraganca\dynamicform\DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsArchivo[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nota',
                ],
            ]); ?>

            <div class="container-items">
                <!-- widgetContainer -->
                <?php foreach ($modelsArchivo as $i => $modelArchivo) : ?>
                    <div class="item panel panel-default">
                        <!-- widgetBody -->
                        <div class="panel-heading">

                            <?php
                            $x = 0;
                            if ($x == 0) $titulo = "Archivo";

                            ?>

                            <h3 class="panel-title pull-left"><?= $titulo ?></h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelArchivo->isNewRecord) {
                                echo Html::activeHiddenInput($modelArchivo, "[{$i}]id");
                            }
                            ?>

                            <?= $form->field($modelArchivo, "[{$i}]id_archivo")->widget(\kartik\select2\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Archivo\Archivo::find()->all(), 'id_archivo', 'titulo_archivo'),
                                    'options' => ['placeholder' => 'Seleccionar', 'multiple' => false, 'required' => true],
                                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                                    'size' => 'xs',]
                            ) ?>

                            <?= $form->field($modelArchivo, "[{$i}]nota")->textarea(['rows' => 6,'style' => 'resize:none']) ?>




                        </div>
                        <div class="pull-right">
                            <button type="button" title="Agregar" style="width: 40px ; height: 40px" class="add-item btn btn-success"><i class="fa fa-plus"></i></button>
                            <button type="button" title="Eliminar" style="width: 40px ; height: 40px" class="remove-item btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                    </div>
                <?php $x++;
                endforeach; ?>
            </div>


            <?php \wbraganca\dynamicform\DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="row panel-heading">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <?php if (Yii::$app->user->can('revisar')) : ?>
                <?= $form->field($model, "revisado")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 ">
            <?php if (Yii::$app->user->can('publicar')) : ?>
                <?= $form->field($model, "publico")->checkbox(); ?>
            <?php else : $x = 0; ?>
                <?= $form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <?= Html::submitButton($modelArchivo->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style'=>"width: 40px; height: 40px", 'title' => 'Guardar']) ?>
            </div>
        </div>
    </div>

    <?php kartik\form\ActiveForm::end(); ?>


    <?php
    $searchModel = new backend\models\Archivo\ArchivoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->pagination = ['pageSize' => 4];
    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'archivo-index-update',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'toolbar' => [
            'options' => ['class' => 'pull-left'],
            [
                'content' =>
                    Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
                        'data-pjax' => 0,
                        'class' => 'btn btn-success',
                        "title" => "Agregar"
                    ]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', 'index.php?r=archivo%2Findex', ['class' => 'btn btn-default', 'title' => 'Reiniciar']),
            ],
            '{toggleData}',
            '{export}',
        ],
        'columns' => [


            //'id_archivo',
            [
                'attribute' => 'revisado',                     // Revisado
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->revisado != '0') {
                        return 'Sí';
                    } else {
                        return 'No';
                    }
                },
                'headerOptions' => ['class' => 'col-md-1'],

                'filter' => array( "1" => "Sí", "0" => "No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),

            ],

            [
                'attribute' => 'titulo_archivo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'tipo_archivo',
                'value' => 'tipoArchivo.tipo_archivo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Archivo\TipoArchivo::find()->asArray()->all(), 'id_tipo_archivo', 'tipo_archivo'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'autor_archivo',                     // autor
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'etiqueta',                     // etiqueta
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha','language' => 'es',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd', 'endDate' => date('Y-m-d')
                    ],
                ]),

            ],
            [
                'attribute' => 'etapa',                     // etapa
                'format' => 'raw',
                'headerOptions' => array('class' => 'col-md-2'),
                'filter' => array("Infancia" => "Infancia", "Adolescencia" => "Adolescencia", "Adulto Joven" => "Adulto Joven", "Adulto" => "Adulto", "Posterior a 1967" => "Posterior a 1967", "No definida" => "No definida"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],

            [
                'attribute' => 'url_archivo', 'filter' => false,             // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'value' => function ($model) {
                    if ($model->url_archivo != ' ' && $model->url_archivo != NULL) { // verifica si fue importada o no
                        if ($model->tipo_archivo == 1) {
                            return Html::img(
                                '../../frontend/web/' . $model->url_archivo,
                                ['alt' => $model->url_archivo, 'height' => 100]
                            );
                        } else if ($model->tipo_archivo == 3) {
                            return '<video  controls autoplay style="height: 100px">
                    <source src="../../frontend/web/' . $model->url_archivo . '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>';
                        } else if ($model->tipo_archivo == 2) {
                            return '<audio  controls style="width: 250px ">
                    <source src="../../frontend/web/' . $model->url_archivo . '" >
                    Your browser does not support the video tag.
                    </audio>';
                        } else {
                            return Html::label('_');
                            // si no tiene asignada una portada, solo muestra un guion bajo
                        }
                    }
                },
            ],


        ],
    ]); ?>




</div>

<script>
    $(document).ready(function(){
        $(":input").inputmask();



        $("#phone").inputmask({
            mask: '999 999 9999',
            placeholder: ' ',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
                var processedValue = pastedValue;

//do something with it

                return processedValue;
            }
        });
    });
</script>