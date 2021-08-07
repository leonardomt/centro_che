<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\CursoOnline */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Curso Online', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-curso-online'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
\yii\web\YiiAsset::register($this);
?>
<div class="curso-online-view col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id_curso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id_curso], [
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
            'titulo:ntext',
            'coordinador',
            'descripcion:ntext',
            'enlace',

            [
                'attribute' => 'pdf',                     // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'value' => function ($model) {
                    if ($model->pdf != ' ' && $model->pdf != NULL) { // verifica si fue importada o no
                        if ($model->pdf != NULL) {
                            return  Html::a('PDF', [
                                '../../frontend/web/' . $model->pdf,
                            ], [
                                'class' => 'btn btn-primary',
                                'target' => '_blank',
                            ]);
                        } else {
                            return Html::label('_');
                            // si no tiene asignada una portada, solo muestra un guion bajo
                        }
                    }
                },
            ],

        ],
    ]) ?>

    <?php
    $clases= \backend\models\CursoOnline\Clase::find()->where(['id_curso' => $model->id_curso ])->all();
    $searchModel = new backend\models\CursoOnline\ClaseSearch();
    $x=0; $data = [];
    foreach ($clases as $clase):
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider1->query->where(['id'=>$clase->id]);
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
        $dataProvider->query->where(['id'=>0]);
    };
    ?>

    <h3>Clases del Curso</h3>

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
                'attribute' => 'publico',                     // Revisado
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
                'attribute' => 'titulo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'profesor',                     // autor
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'descripcion',
                'headerOptions' => ['class' => 'col-md-3'],
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div style="line-height: 1.2em; height: 6em; overflow: hidden;">'.\yii\helpers\HtmlPurifier::process($model->descripcion).'</div>';
                },

            ],
            [
                'attribute' => 'enlace',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'headerOptions' => ['class' => 'col-md-1'],
                'buttons' => [
                    'view' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-success" style="width: 40px ; margin-top: 2px"><i class="fa fa-eye"></i></button>',$url);
                    },
                    'update' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-primary" style="width: 40px; margin-top: 2px"><i class="fa fa-pencil"></i></button>',$url);
                    },
                    'delete' => function ($url, $model)
                    {

                        return Html::a('<button class="btn btn-danger" style="width: 40px ; margin-top: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],

        ],
    ]); ?>



</div>
