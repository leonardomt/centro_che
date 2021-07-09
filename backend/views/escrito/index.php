<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Escrito\EscritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escrito-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => (new \backend\models\Escrito\EscritoSearch()),
        'id'=> 'noticia-index-update',
        'columns' => [

            [
                'attribute' => 'revisado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
            ],
            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
            ],
            [                
                'attribute' => 'titulo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
            ],

             [                
                'attribute' => 'tipo',                     // tipo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => array('Crónica'=>'Crónica','Poesía'=>'Poesía', 'Artículo'=>'Artículo', 'Apuntes de Lectura'=>'Apuntes de Lectura', 'Prólogo'=>'Prólogo', 'Ensayo'=>'Ensayo', ''=>'Todos'),
            ],
        
            [
                'attribute' => 'descripcion',
                'headerOptions' => ['class' => 'col-md-5'],
                'format' => 'raw',
            ],

        

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>
