<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Testimonio\TestimonioArchivo;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\Testimonio */


$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="testimonio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_testimonio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_testimonio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que deceas eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha',
            'autor',
            'titulo:ntext',
            'descripcion:ntext',
            'cuerpo:ntext',
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
        ],
    ]) ?>

</div>

 <?php
   


    $archivos = new TestimonioArchivo();
    $archivos= TestimonioArchivo::find()->where(['id_testimonio' => $model->id_testimonio ])->all();



    $searchModel = new backend\models\Archivo\ArchivoSearch();
    $x=0; $data;
    foreach ($archivos as $arc):
        $x++;
        if ($x==1){
            $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider1->query->where(['id_archivo'=>$arc->id_archivo]);
            $data = $dataProvider1->getModels();
        }
        if ($x==2){
            $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider2->query->where(['id_archivo'=>$arc->id_archivo]);
            $data =  array_merge($dataProvider1->getModels(), $dataProvider2->getModels());
        }
        if ($x==3){
            $dataProvider3 = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider3->query->where(['id_archivo'=>$arc->id_archivo]);
            $data1 = array_merge($dataProvider1->getModels(), $dataProvider2->getModels());
            $data = array_merge($data1, $dataProvider3->getModels());
        }
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




    <?php yii\widgets\Pjax::begin(); 
    $idtestimonio = $model->id_testimonio;?>
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

                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),

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
                'attribute' => 'url_archivo',                     // Url del Archivo
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
                'class' =>'kartik\grid\ActionColumn',
                'template' => '{view} {delete}',
                 'buttons'=> [
                        'view' => function($url, $model) {
                            return Html::a('<span class="fa fa-eye"></span>' , ['archivo/view', 'id' => $model->id_archivo], ['title' => 'view']);
                        },

                        'delete' => function($url, $model) use ($idtestimonio) {
                            return Html::a('<span class= "glyphicon glyphicon-trash"></span>', ['testimonio-archivo/delete', 'id' => $model->id_archivo, 'id2' => $idtestimonio], [
                            'data' => [
                                'confirm' => 'Está seguro de que desea eliminar este elemento?',
                                'method' => 'post',
                            ],
                            'title' => "Eliminar"

                            ]);
                        } ,
                ],


            ],



        ],
    ]); ?>
