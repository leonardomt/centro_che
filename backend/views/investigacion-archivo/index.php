<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Investigacion\InvestigacionArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Investigación-Archivo';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="investigacion-archivo-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Crear Investigación-Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute'=>'id_archivo',
                'value'=>'archivo.titulo_archivo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Archivo\Archivo::find()->asArray()->all(), 'id_archivo', 'titulo_archivo'),
            ],

            [
                'attribute'=>'id_investigacion',
                'value'=>'investigacion.titulo_investigacion',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Investigacion\Investigacion::find()->asArray()->all(), 'id_investigacion', 'titulo_investigacion'),
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
