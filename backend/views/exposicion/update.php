<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Exposicion\Exposicion */

$this->title = 'Modificar Exposición: ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Exposiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->id_exposicion]];
$this->params['breadcrumbs'][] = 'Modificar';
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if (!Yii::$app->user->can('gestionar-exposicion'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

if ($model->tipo_fecha == 0) {

}
if ($model->tipo_fecha == 1) {

}
if ($model->tipo_fecha == 2) {
    $model->fecha_anno = (int)date("yyyy", $model->fecha);
    $model->fecha_fin = null;
    $model->fecha_anno = null;
}
if ($model->tipo_fecha == 3) {
    $model->fecha_anno = (int)'2015';
    $model->fecha_anno_fin = (int)'2015';
    $model->fecha = null;
    $model->fecha_fin = null;
}
?>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<div class="exposicion-update col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>


    <?php $form = \kartik\form\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <br>


    <div class="row">

        <div class="col-md-4">
            <?= $form->field($model, 'tipo_fecha')->dropDownList(['0' => 'Fecha Exacta', '1' => 'Rango de Fecha', '2' => 'Año', '3' => 'Rango de años'], ['prompt' => '-Seleccionar-']) ?>
        </div>
        <div class="col-md-8" id="solo_fecha" <?php if ($model->tipo_fecha == 0) {
            echo 'style="display: block"';
        } else {
            echo 'style="display: none"';
        } ?>>
            <?php
            \yii\widgets\MaskedInput::widget([
                'name' => 'input-32',
                'clientOptions' => ['alias' => 'yyyy-mm-dd']
            ]);
            ?>
            <div class="text-lg-left">
                <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(), [
                    'inline' => false, 'language' => 'es', 'options' => [
                        'data-inputmask' => "'alias': 'yyyy-mm-dd'",
                        'autocomplete' => 'off',
                    ],
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                        'endDate' => date('Y-m-d'),
                        'alias' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
        </div>
        <div class="col-md-4" id="fecha" <?php if ($model->tipo_fecha == 1) {
            echo 'style="display: block"';
        } else {
            echo 'style="display: none"';
        } ?>>
            <?php
            \yii\widgets\MaskedInput::widget([
                'name' => 'input-32',
                'clientOptions' => ['alias' => 'yyyy-mm-dd']
            ]);
            ?>
            <div class="text-lg-left">
                <?= $form->field($model, 'fecha_inicio')->widget(\dosamigos\datepicker\DatePicker::className(), [
                    'inline' => false, 'language' => 'es', 'options' => [
                        'data-inputmask' => "'alias': 'yyyy-mm-dd'",
                        'autocomplete' => 'off',
                    ],
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                        'endDate' => date('Y-m-d'),
                        'alias' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
        </div>
        <div class="col-md-4" id="fecha_fin" <?php if ($model->tipo_fecha == 1) {
            echo 'style="display: block"';
        } else {
            echo 'style="display: none"';
        } ?>>
            <?php
            \yii\widgets\MaskedInput::widget([
                'name' => 'input-32',
                'clientOptions' => ['alias' => 'yyyy-mm-dd']
            ]);
            ?>
            <div class="text-lg-left">
                <?= $form->field($model, 'fecha_fin')->widget(\dosamigos\datepicker\DatePicker::className(), [
                    'inline' => false, 'language' => 'es', 'options' => [
                        'data-inputmask' => "'alias': 'yyyy-mm-dd'",
                        'autocomplete' => 'off',
                    ],
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                        'endDate' => date('Y-m-d'),
                        'alias' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
        </div>
        <div class="col-md-8" id="anno" <?php if ($model->tipo_fecha == 2) {
            echo 'style="display: block"';
        } else {
            echo 'style="display: none"';
        } ?>">

        <?php
        echo $form->field($model, 'fecha_anno')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '9999', 'options' => ['placeholder' => 'Año']]);
        ?>
    </div>

    <div class="col-md-4" id="rango_anno" <?php if ($model->tipo_fecha == 3) {
        echo 'style="display: block"';
    } else {
        echo 'style="display: none"';
    } ?>>
        <?php
        echo $form->field($model, 'fecha_anno_inicio')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '9999', 'options' => ['placeholder' => 'Año']]);
        ?>
    </div>
    <div class="col-md-4" id="rango_anno_fin" <?php if ($model->tipo_fecha == 3) {
        echo 'style="display: block"';
    } else {
        echo 'style="display: none"';
    } ?>>
        <?php
        echo $form->field($model, 'fecha_anno_fin')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '9999', 'options' => ['placeholder' => 'Año']]);
        ?>
    </div>


</div>


<div class="row">
    <div class="col-lg-6 text-lg-left">
        <?= $form->field($model, 'enlace')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-lg-6 text-lg-left">
        <?= $form->field($model, 'entidad')->textInput(['maxlength' => true]) ?>

    </div>
</div>


<?= $form->field($model, 'descripcion')->textarea(['rows' => 3, 'style' => 'resize:none']) ?>

<?= $form->field($model, 'cuerpo')->textarea(['rows' => 3, 'style' => 'resize:none']) ?>


<div class="panel panel-default">
    <div class="panel-body">
        <?php \wbraganca\dynamicform\DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 3, // the maximum times, an element can be cloned (default 999)
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

                        <?= $form->field($modelArchivo, "[{$i}]nota")->textarea(['rows' => 6, 'style' => 'resize:none']) ?>


                    </div>
                    <div class="pull-right">
                        <button type="button" title="Agregar" style="width: 40px ; height: 40px"
                                class="add-item btn btn-success"><i class="fa fa-plus"></i></button>
                        <button type="button" title="Eliminar" style="width: 40px ; height: 40px"
                                class="remove-item btn btn-danger"><i class="fa fa-trash"></i></button>
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

<div class="row">
    <div class="col-lg-5 text-lg-left">
        <?php if (Yii::$app->user->can('revisar')) : ?>
            <?= $form->field($model, "revisado")->checkbox(); ?>
        <?php else : $x = 0; ?>
            <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-4 text-lg-left">
        <?php if (Yii::$app->user->can('publicar')) : ?>
            <?= $form->field($model, "publico")->checkbox(); ?>
        <?php else : $x = 0; ?>
            <?= $form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <?= Html::submitButton($modelArchivo->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'style' => "width: 40px; height: 40px", 'title' => 'Guardar']) ?>
        </div>
    </div>
</div>

<?php \kartik\form\ActiveForm::end(); ?>


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

            'filter' => array("1" => "Sí", "0" => "No"),
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
                'attribute' => 'fecha', 'language' => 'es',
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

    $(document).ready(function () {
        $(":input").inputmask();


        $("#date").inputmask({
            mask: 'aaaa mm dd',
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


    $(document).ready(function () {
        $(document.body).on('change', '#exposicion-tipo_fecha', function () {
            var val = $('#exposicion-tipo_fecha').val();
            if (val > 0) {
                $('.class').hide();
            } else {
                $('.class').show();
            }
        });
    });


    $(document).ready(function () {
        $('#exposicion-tipo_fecha').on('change', function () {

            if ($(this).val() == 0) {
                document.getElementById("solo_fecha").style.display = "block";
                document.getElementById("fecha").style.display = "none";
                document.getElementById("fecha_fin").style.display = "none";
                document.getElementById("anno").style.display = "none";
                document.getElementById("rango_anno").style.display = "none";
                document.getElementById("rango_anno_fin").style.display = "none";
            }
            if ($(this).val() == 1) {
                document.getElementById("solo_fecha").style.display = "none";
                document.getElementById("fecha").style.display = "block";
                document.getElementById("fecha_fin").style.display = "block";
                document.getElementById("anno").style.display = "none";
                document.getElementById("rango_anno").style.display = "none";
                document.getElementById("rango_anno_fin").style.display = "none";
            }
            if ($(this).val() == 2) {
                document.getElementById("solo_fecha").style.display = "none";
                document.getElementById("fecha").style.display = "none";
                document.getElementById("fecha_fin").style.display = "none";
                document.getElementById("anno").style.display = "block";
                document.getElementById("rango_anno").style.display = "none";
                document.getElementById("rango_anno_fin").style.display = "none";
            }
            if ($(this).val() == 3) {
                document.getElementById("solo_fecha").style.display = "none";
                document.getElementById("fecha").style.display = "none";
                document.getElementById("fecha_fin").style.display = "none";
                document.getElementById("anno").style.display = "none";
                document.getElementById("rango_anno").style.display = "block";
                document.getElementById("rango_anno_fin").style.display = "block";
            }
        });
    });


</script>