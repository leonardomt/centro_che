
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */

/* @var $searchModel backend\models\Articulo\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Artículos';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>

<div class="articulo-index  col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    </div>
    <p>
        <?= Html::a('<span class="fa fa-plus "></span>', ['create'], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>
    </p>

    <?php Pjax::begin([
        'id' => 'articulo-index-update',
    ]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => (new \backend\models\Articulo\ArticuloSearch()),
        'id'=> 'articulo-index-update',
        
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
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'autor',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],


            [
                'attribute'=>'id_investigacion',
                'value'=>'investigacionInscrita.titulo_investigacion',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Investigacion\Investigacion::find()->asArray()->all(), 'id_investigacion', 'titulo_investigacion'),

            ],

            [
                'attribute' => 'resumen',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return '<div style="line-height: 1.2em; height: 6em; overflow: hidden;">'.\yii\helpers\HtmlPurifier::process($model->resumen).'</div>';
                },


            ],

            [
                'attribute' => 'palabras_clave',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],

            [
                'attribute' => 'keywords',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],





             [
                            'attribute' => 'fecha',
                            'value'=> 'fecha',
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                            'filter'=>\dosamigos\datepicker\DatePicker::widget([
                                'model'=>$searchModel,
                                'attribute'=>'fecha',
                                'clientOptions'=>[
                                    'autoclose'=>true,
                            'format'=>'yyyy-mm-dd'
                    ],
                ]),
            ],
            [
                'class' => 'yii\grid\ActionColumn',

            ],
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
