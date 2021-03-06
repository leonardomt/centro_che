<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Articulo\ArticuloArchivo;
use backend\models\Archivo\Archivo;
use backend\models\Otros\OtrosArchivo;
use kartik\icons\Icon;
Icon::map($this, Icon::EL); // Maps the Elusive icon font framework
/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\Articulo */


$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-coordinacion'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

\yii\web\YiiAsset::register($this);
?>
<div class="articulo-view col-md-12">

    <h1><?= $model->titulo; ?></h1>



    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id_articulo], ['class' => 'btn btn-primary','title'=>"Modificar",'style'=>"width: 40px ; height: 40px",]) ?>
        <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id_articulo], [
            'class' => 'btn btn-danger',
            'title'=>"Eliminar",
            'style'=>"width: 40px ; height: 40px",
            'data' => [
                'confirm' =>'??Estas seguro que deseas eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'revisado',
                'value' => function ($model) {
                    return $model->revisado ? 'S??' : 'No';
                },
            ],
            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'S??' : 'No';
                },
            ],
            'titulo',
            'autor',
            [
            'attribute' =>'id_investigacion',
            'value'=> \backend\models\Investigacion\Investigacion::findOne(['id_investigacion', $model->id_investigacion])->titulo_investigacion,
            ],
            [
                'attribute' => 'tipo_fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    if ($model->tipo_fecha == 0) {
                        return "Fecha exacta";
                    };
                    if ($model->tipo_fecha == 1) {
                        return "Rango de fecha";
                    };
                    if ($model->tipo_fecha == 2) {
                        return "A??o";
                    };
                    if ($model->tipo_fecha == 3) {
                        return "A??o y mes";
                    };
                    if ($model->tipo_fecha == 4) {
                        return "Rango de meses";
                    };

                },
                'filter' => array(0 => "Fecha Exacta", 1 => "Rango de fecha", 2 => "A??o", 3 => "A??o y mes", 4 => "Rango de meses"),

            ],
            [
                'attribute' => 'fecha',
                'format' => 'raw',
                'value'=> function ($model) {
                    if ($model->tipo_fecha ==0){  return $model->fecha;};
                    if ($model->tipo_fecha ==1){  return $model->fecha;};
                    if ($model->tipo_fecha ==2){  return date('Y',strtotime($model->fecha));};
                    if ($model->tipo_fecha ==3){  return date('Y-m',strtotime($model->fecha));};
                    if ($model->tipo_fecha ==4){  return date('Y-m',strtotime($model->fecha));};

                },
                'headerOptions' => ['class' => 'col-md-1'],
            ],
            [
                'attribute' => 'fecha_fin',
                'format' => 'raw',
                'value'=> function ($model) {
                    if ($model->tipo_fecha ==0){  return null;};
                    if ($model->tipo_fecha ==1){  return $model->fecha_fin;};
                    if ($model->tipo_fecha ==2){  return null;};
                    if ($model->tipo_fecha ==3){  return null;};
                    if ($model->tipo_fecha ==4){  return date('Y-m',strtotime($model->fecha_fin));};

                },
                'headerOptions' => ['class' => 'col-md-1'],
            ],
            'descripcion:ntext',
            'cuerpo:ntext',


        ],
    ]) ?>

        <?php
       $archivos= ArticuloArchivo::find()->where(['id_articulo' => $model->id_articulo ])->all();
       $searchModel = new backend\models\Archivo\ArchivoSearch();
       $x=0; $data = [];
       foreach ($archivos as $arc):
           $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
           $dataProvider1->query->where(['id_archivo'=>$arc->id_archivo]);
           $data1 = $dataProvider1->getModels();
           $data = array_merge($data, $data1);
           $x++;
       endforeach;

       if ($x!=0){
           $dataProvider = new \yii\data\ArrayDataProvider([
               'allModels' => $data

           ]);
       }
       else{
           $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
           $dataProvider->query->where(['id_archivo'=>0]);
       };
       ?>


    <?= kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'id'=> 'archivo-index-update',

        'pjax' => true,
        'pjaxSettings' =>[
            'neverTimeout' => true,

        ],
        'toolbar'=>[
            'options' => ['class' => 'pull-left'],
            ['content'=>
                Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
                    'data-pjax' => 0,
                    'class' => 'btn btn-success',
                    "title"=>"Agregar"]). ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', 'index.php?r=archivo%2Findex', [ 'class'=>'btn btn-default', 'title'=>'Reiniciar']),
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
                    if($model->revisado != '0'){
                        return 'S??';
                    }else{
                        return 'No';
                    }
                },
                'headerOptions' => ['class' => 'col-md-1'],

                'filter'=>array("1"=>"S??","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],

            [
                'attribute' => 'titulo_archivo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute'=>'tipo_archivo',
                'value'=>'tipoArchivo.tipo_archivo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Archivo\TipoArchivo::find()->asArray()->all(), 'id_tipo_archivo', 'tipo_archivo'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),    ],
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
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'etapa',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'url_archivo',             'filter'=> false,        // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'value' => function ($model) {
                    if($model->url_archivo != ' ' && $model->url_archivo != NULL) { // verifica si fue importada o no
                        if ($model->tipo_archivo == 1) {
                            return Html::img('../../frontend/web/' . $model->url_archivo,
                                ['alt' => $model->url_archivo, 'height' => 100]);
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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}','header'=>false,
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', ['archivo/view', 'id' => $model->id_archivo], ['title' => 'view']);
                    },


                ],


            ],
        ],
    ]); ?>



</div>

