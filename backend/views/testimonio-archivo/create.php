<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $id */
/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\TestimonioArchivo */

$this->title = 'Asignar Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Testimonio Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="testimonio-archivo-create">

    <?php
    $titulo = new \backend\models\Testimonio\Testimonio();
    $titulo = \backend\models\Testimonio\Testimonio::find()->where(['id_testimonio' => $id])->one();
    $nombre = $titulo->titulo;
    ?>
    <h1><?= Html::encode($this->title) . ' a "' . $nombre . '"' ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

    <?php
    $searchModel = new backend\models\Archivo\ArchivoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->pagination = ['pageSize' => 4];
    ?>




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

                'filter' => array("" => "Todos", "1" => "Sí", "0" => "No"),

            ],

            [
                'attribute' => 'titulo_archivo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'tipo_archivo',
                'value' => 'tipoArchivo.tipo_archivo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Archivo\TipoArchivo::find()->asArray()->all(), 'id_tipo_archivo', 'tipo_archivo'),
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
                'attribute' => 'url_archivo', 'filter' => false,                 // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'value' => function ($model) {
                    if ($model->url_archivo != ' ' && $model->url_archivo != NULL) { // verifica si fue importada o no
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


        ],
    ]); ?>




</div>
