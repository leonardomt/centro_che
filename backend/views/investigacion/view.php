<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Investigacion\InvestigacionArchivo;
use backend\models\Archivo\Archivo;
use backend\models\Hecho\HechoArchivo;
/* @var $this yii\web\View */
/* @var $model backend\models\Investigacion\Investigacion */

$this->title = $model->titulo_investigacion;
$this->params['breadcrumbs'][] = ['label' => 'Investigaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$articuloarchivos = new InvestigacionArchivo();
$articuloarchivos= InvestigacionArchivo::find()->where(['id_investigacion' => $model->id_investigacion])->all();
$archivos = new Archivo();
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-investigacion'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

\yii\web\YiiAsset::register($this);
?>
<div class="investigacion-view col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id_investigacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id_investigacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' =>'¿Estas seguro que deceas eliminar este elemento?',
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
                    return $model->revisado ? 'Si' : 'No';
                },
            ],
            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
            ],
            'titulo_investigacion:ntext',
            'autor:ntext',
            [
                'attribute' =>'id_linea_investigacion',
                'value'=> \backend\models\LineaInvestigacion\LineaInvestigacion::findOne(['id_linea_investigacion', $model->id_linea_investigacion])->nombre_linea,
            ],
            'descripcion:ntext',
            'cuerpo:ntext',
            'fecha',
            'entidad',

        ],

    ]) ?>

    <?php
    $archivos= InvestigacionArchivo::find()->where(['id_investigacion' => $model->id_investigacion ])->all();
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


    <?php yii\widgets\Pjax::begin();?>

    <?= kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                        return 'Si';
                    }else{
                        return 'No';
                    }
                },
                'headerOptions' => ['class' => 'col-md-1'],

                'filter'=>array("1"=>"Si","0"=>"No"),
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
                'attribute' => 'fuente',                     // fuente
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'url_archivo',
                'filter'=> false,             // Url del Archivo
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
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button class="btn btn-success" style="width: 40px ; margin-top: 2px"><i class="fa fa-eye"></i></button>', ['archivo/view', 'id' => $model->id_archivo], ['title' => 'view']);
                    },


                ],


            ],

        ],
    ]); ?>



</div>
