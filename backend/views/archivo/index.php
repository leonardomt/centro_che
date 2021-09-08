<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Archivo\ArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archivos';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(Url::to(['site/login']));
?>


<div class="archivo-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span class="fas fa-file-upload "></span>', ['create'], [
            'class' => 'btn btn-success',
            "title" => "Agregar",
            'style'=>"width: 40px ; height: 40px",
        ])
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'archivo-index-update',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

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
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'tipo_archivo',
                'value' => 'tipoArchivo.tipo_archivo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Archivo\TipoArchivo::find()->asArray()->all(), 'id_tipo_archivo', 'tipo_archivo'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'autor_archivo',                     // autor
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],

            ],

            [
                'attribute' => 'etiqueta',                     // etiqueta
                'format' => 'raw',
                'headerOptions' => [
                        'class' => 'col-md-1',
                        'value' => '"<a><span class=\"icon-camera\"></span></a>"',
                ]
            ],

            /*
            [
                'attribute' => 'fecha',                     // fecha
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter'=> DateRangePicker::widget([
                    'name'=>'date_range_2',
                    'presetDropdown'=>true,
                    'convertFormat'=>true,
                    'includeMonthsFilter'=>true,
                    'pluginOptions' => ['locale' => ['format' => 'd-M-y']],
                    'options' => ['placeholder' => 'Select range...']
                ]),
            ],
*/
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
                'headerOptions' => array('class' => 'col-md-1'),
                'filter' => array("Infancia" => "Infancia", "Adolescencia" => "Adolescencia", "Adulto Joven" => "Adulto Joven", "Adulto" => "Adulto", "Posterior a 1967" => "Posterior a 1967", "No definida" => "No definida"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],

            [
                'attribute' => 'url_archivo',         'filter'=> false,            // Url del Archivo
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
                            return '<audio  controls style="width: 230px ">
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


            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}','header'=>false,
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'view' => function ($url, $model)
                    {
                        return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>',$url);
                    },
                    'update' => function ($url, $model)
                    {
                        return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>',$url);
                    },
                    'delete' => function ($url, $model)
                    {

                        return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],

        ],
    ]); ?>



</div>