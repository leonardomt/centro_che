<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use common\widgets\Alert;
use kartik\grid\GridView;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\Revista\Paradigma */

$this->title = 'Paradigma';
$this->params['breadcrumbs'][] = ['label' => 'Paradigma', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paradigma-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="fa fa-plus "></span>', ['/paradigma-archivo/create'], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>
        <?= Html::a('Gestionar Catálogo', ['/revista/index'], ['class' => 'btn btn-primary']) ?>

    
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'descripcion:ntext',
            'enlace:ntext',
        ],
    ]) ?>


    <?php
    $searchModel = new backend\models\Revista\ParadigmaArchivoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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

            [
                'attribute' => 'url',                     // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-10'],
                'value' => function ($model) {
                    if ($model->url != ' ' && $model->url != NULL) { // verifica si fue importada o no

                        return Html::img(
                            '../../frontend/web/' . $model->url,
                            ['alt' => $model->url, 'height' => 250]
                        );
                    } else {
                        return Html::label('_');
                        // si no tiene asignada una portada, solo muestra un guion bajo
                    }
                }

            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{delete}',
                'headerOptions' => ['class' => 'col-md-1'],
            ],


        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>