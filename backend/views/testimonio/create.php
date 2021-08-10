<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\Testimonio */

$this->title = 'Insertar Testimonio';
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-testimonio'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="testimonio-create">

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
            <?= $form->field($model, 'fecha')->widget(\dosamigos\datepicker\DatePicker::className(), [
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ]
            ]) ?>
        </div>

        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6,'style' => 'resize:none']) ?>



    <div class="panel panel-default">
        <div class="panel-body">
            <?php \wbraganca\dynamicform\DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 6, // the maximum times, an element can be cloned (default 999)
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
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </div>
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


                            <?= $form->field($modelArchivo, "[{$i}]nota")->textarea(['rows' => 3,'style' => 'resize:none']) ?>


                        </div>
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
                <?= Html::submitButton($modelArchivo->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>

    <?php \kartik\form\ActiveForm::end(); ?>


    <?php
    $searchModel = new backend\models\Archivo\ArchivoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>



    <?php Pjax::begin(); ?>
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
                        return 'Si';
                    } else {
                        return 'No';
                    }
                },
                'headerOptions' => ['class' => 'col-md-1'],

                'filter' => array("" => "Todos", "1" => "Si", "0" => "No"),

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
                'attribute' => 'fuente',                     // fuente
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'url_archivo',         'filter'=> false,            // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
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

    <?php Pjax::end(); ?>
</div>