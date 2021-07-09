<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Otros\OtrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Otros Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otros-index">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?php Pjax::begin( [
        'id' => 'otros-index',
    ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'headerOptions' => ['class' => 'col-md-4']
            ],
            [
                'attribute' => 'autor',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],
            [
                'attribute' => 'tipo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],
     

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


<?php

$this->registerJs(

    '$("document").ready(function(){ 

        $("#search-form").on("pjax:end", function() {

            $.pjax.reload({container:"#articulo-index-update"});  //Reload GridView

        });

    });'

);

?>