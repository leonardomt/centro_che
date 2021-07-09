<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumental */

$this->title = "Portada de la Colección Documental";
$this->params['breadcrumbs'][] = ['label' => 'Gestion Documentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gestion-documental-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar Descripción', ['update', 'id' => $model->id_gestion_documental], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Insertar Imagen', ['/gestion-documental-archivo/create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Gestionar Documentos', ['/coleccion-documental/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'descripcion',
        ],
    ]) ?>


    <?php
    $searchModel = new backend\models\GestionDocumental\GestionDocumentalArchivoSearch();
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
                'buttons' => [
                    'delete' => function ($url, $model) {
                        $url = Url::to(['/gestion-documental-archivo/delete', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => 'delete', 'data' => [
                            'method' => 'post',
                             // use it if you want to confirm the action
                             'confirm' => '¿Desea eliminar la imagen del carrusel?',
                         ],]);
                    },

                ],

                'headerOptions' => ['class' => 'col-md-1'],
            ],


        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>