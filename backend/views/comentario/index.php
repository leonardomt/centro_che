<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Comentario\ComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <h4>Sin Revisar</h4>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'columns' => [
            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha','language' => 'es',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd', 'endDate' => date('Y-m-d')
                    ],
                ]),
            ],
            [
                'attribute' => 'alias',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            //'correo',
            [
                'attribute' => 'comentario',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'seccion',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'tabla',
                'headerOptions' => ['class' => 'col-md-2'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                return 'Actualidad';
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                return 'Artículo';
                            }
                            if ($modelpadre->tabla == 'taller') {
                                return 'Proyecto Comunitario';
                            }

                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        return 'Actualidad';
                    }
                    if ($model->tabla == 'articulo') {
                        return 'Artículo';
                    }
                    if ($model->tabla == 'taller') {
                        return 'Proyecto Comunitario';
                    }

                },
                'format' => 'raw',
                'filter' => array('noticia' => 'Actualidad', 'articulo' => 'Artículo', 'taller' => 'Proyecto Comunitario', 'comentario' => 'Comentario'),
            ],


            [
                'attribute' => 'id_tabla',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $modelpadre->id_tabla])->one();
                                return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $modelpadre->id_tabla])->one();
                                return Html::a($articulo->titulo, ['articulo/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'taller') {
                                $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $modelpadre->id_tabla])->one();
                                return Html::a($taller->nombre, ['taller/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $model->id_tabla])->one();
                        return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'articulo') {
                        $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $model->id_tabla])->one();
                        return Html::a($articulo->titulo, ['articulo/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'taller') {
                        $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $model->id_tabla])->one();
                        return Html::a($taller->nombre, ['taller/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                },
                'format' => 'raw',
                'filter' => false,
            ],
            //'publico',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{aprobar}{delete}',
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button title="Ver" class="btn btn-success" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', $url);
                    },
                    'aprobar' => function ($url, $model) {
                        return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-check"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea aprobar este comentario?', 'data-method' => 'POST']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-times"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea denegar este comentario?', 'data-method' => 'POST']);
                    }
                ],
            ],
        ],
    ]); ?>



    <hr class="page_separator"/>

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Publicados</h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'columns' => [

            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd', 'endDate' => date('Y-m-d')
                    ],
                ]),
            ],
            [
                'attribute' => 'alias',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            //'correo',
            [
                'attribute' => 'comentario',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'seccion',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'tabla',
                'headerOptions' => ['class' => 'col-md-2'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                return 'Actualidad';
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                return 'Artículo';
                            }
                            if ($modelpadre->tabla == 'taller') {
                                return 'Proyecto Comunitario';
                            }

                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        return 'Actualidad';
                    }
                    if ($model->tabla == 'articulo') {
                        return 'Artículo';
                    }
                    if ($model->tabla == 'taller') {
                        return 'Proyecto Comunitario';
                    }

                },
                'format' => 'raw',
                'filter' => array('noticia' => 'Actualidad', 'articulo' => 'Artículo', 'taller' => 'Proyecto Comunitario', 'comentario' => 'Comentario'),
            ],


            [
                'attribute' => 'id_tabla',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $modelpadre->id_tabla])->one();
                                return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $modelpadre->id_tabla])->one();
                                return Html::a($articulo->titulo, ['articulo/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'taller') {
                                $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $modelpadre->id_tabla])->one();
                                return Html::a($taller->nombre, ['taller/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $model->id_tabla])->one();
                        return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'articulo') {
                        $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $model->id_tabla])->one();
                        return Html::a($articulo->titulo, ['articulo/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'taller') {
                        $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $model->id_tabla])->one();
                        return Html::a($taller->nombre, ['taller/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                },
                'format' => 'raw',
                'filter' => false,
            ],
            //'publico',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{aprobar}{delete}',
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button title="Ver" class="btn btn-success" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', $url);
                    },
                    'aprobar' => function ($url, $model) {
                        return Html::a('<button title="Aprobar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-check"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea aprobar este comentario?', 'data-method' => 'POST']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<button title="Denegar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-times"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea denegar este comentario?', 'data-method' => 'POST']);
                    }
                ],
            ],
        ],
    ]); ?>


    <hr class="page_separator"/>
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Denegados</h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'columns' => [

            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd', 'endDate' => date('Y-m-d')
                    ],
                ]),
            ],
            [
                'attribute' => 'alias',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            //'correo',
            [
                'attribute' => 'comentario',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'seccion',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'tabla',
                'headerOptions' => ['class' => 'col-md-2'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                return 'Actualidad';
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                return 'Artículo';
                            }
                            if ($modelpadre->tabla == 'taller') {
                                return 'Proyecto Comunitario';
                            }

                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        return 'Actualidad';
                    }
                    if ($model->tabla == 'articulo') {
                        return 'Artículo';
                    }
                    if ($model->tabla == 'taller') {
                        return 'Proyecto Comunitario';
                    }

                },
                'format' => 'raw',
                'filter' => array('noticia' => 'Actualidad', 'articulo' => 'Artículo', 'taller' => 'Proyecto Comunitario', 'comentario' => 'Comentario'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],


            [
                'attribute' => 'id_tabla',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $modelpadre->id_tabla])->one();
                                return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $modelpadre->id_tabla])->one();
                                return Html::a($articulo->titulo, ['articulo/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            if ($modelpadre->tabla == 'taller') {
                                $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $modelpadre->id_tabla])->one();
                                return Html::a($taller->nombre, ['taller/view', 'id' => $modelpadre->id_tabla], [
                                    "title" => "Ver"]);
                            }
                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        $noticia = \backend\models\Noticia\Noticia::find()->where(['id_noticia' => $model->id_tabla])->one();
                        return Html::a($noticia->titulo_noticia, ['noticia/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'articulo') {
                        $articulo = \backend\models\Articulo\Articulo::find()->where(['id_articulo' => $model->id_tabla])->one();
                        return Html::a($articulo->titulo, ['articulo/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'taller') {
                        $taller = \backend\models\Taller\Taller::find()->where(['id_taller' => $model->id_tabla])->one();
                        return Html::a($taller->nombre, ['taller/view', 'id' => $model->id_tabla], [
                            "title" => "Ver"]);
                    }
                },
                'format' => 'raw',
                'filter' => false,
            ],
            //'publico',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{aprobar}{delete}',
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button title="Ver" class="btn btn-success" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', $url);
                    },
                    'aprobar' => function ($url, $model) {
                        return Html::a('<button title="Aprobar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-check"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea aprobar este comentario?', 'data-method' => 'POST']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<button title="Denegar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-times"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea denegar este comentario?', 'data-method' => 'POST']);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
