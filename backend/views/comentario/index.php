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


    <?php Pjax::begin(); ?>

    <h4>Sin Revisar</h4>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
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
                'headerOptions' => ['class' => 'col-md-3'],
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
                            if ($modelpadre->tabla == 'revista') {
                                return 'Revista';
                            }
                            if ($modelpadre->tabla == 'quienes') {
                                return 'Quienes Somoms';
                            }
                            if ($modelpadre->tabla == 'linea_investigacion') {
                                return 'Línea de Investigación';
                            }
                            if ($modelpadre->tabla == 'investigacion') {
                                return 'Investigación';
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                return 'Artículo';
                            }
                            if ($modelpadre->tabla == 'gestion_documental') {
                                return 'Colección Documental';
                            }
                            if ($modelpadre->tabla == 'coleccion_documental') {
                                return 'Documento';
                            }
                            if ($modelpadre->tabla == 'proyecto') {
                                return 'Proyecto Editorial';
                            }
                            if ($modelpadre->tabla == 'libro') {
                                return 'Libro';
                            }
                            if ($modelpadre->tabla == 'curso_online') {
                                return 'Curso Online';
                            }
                            if ($modelpadre->tabla == 'clase') {
                                return 'Clase';
                            }
                            if ($modelpadre->tabla == 'taller') {
                                return 'Proyecto Comunitario';
                            }
                            if ($modelpadre->tabla == 'exposicion') {
                                return 'Exposicion';
                            }
                            if ($modelpadre->tabla == 'producto_audiovisual') {
                                return 'Producto Audiovisual';
                            }
                            if ($modelpadre->tabla == 'otros') {
                                return 'Otros Productos';
                            }
                            if ($modelpadre->tabla == 'hecho') {
                                return 'Cronología';
                            }
                            if ($modelpadre->tabla == 'correspondencia') {
                                return 'Correspondencia';
                            }
                            if ($modelpadre->tabla == 'escrito') {
                                return 'Escrito';
                            }
                            if ($modelpadre->tabla == 'discurso') {
                                return 'Discurso y Entrevista';
                            }
                            if ($modelpadre->tabla == 'testimonio') {
                                return 'Testimonio';
                            }
                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        return 'Actualidad';
                    }
                    if ($model->tabla == 'revista') {
                        return 'Revista';
                    }
                    if ($model->tabla == 'quienes') {
                        return 'Quienes Somoms';
                    }
                    if ($model->tabla == 'linea_investigacion') {
                        return 'Línea de Investigación';
                    }
                    if ($model->tabla == 'investigacion') {
                        return 'Investigación';
                    }
                    if ($model->tabla == 'articulo') {
                        return 'Artículo';
                    }
                    if ($model->tabla == 'gestion_documental') {
                        return 'Colección Documental';
                    }
                    if ($model->tabla == 'coleccion_documental') {
                        return 'Documento';
                    }
                    if ($model->tabla == 'proyecto') {
                        return 'Proyecto Editorial';
                    }
                    if ($model->tabla == 'libro') {
                        return 'Libro';
                    }
                    if ($model->tabla == 'curso_online') {
                        return 'Curso Online';
                    }
                    if ($model->tabla == 'clase') {
                        return 'Clase';
                    }
                    if ($model->tabla == 'taller') {
                        return 'Proyecto Comunitario';
                    }
                    if ($model->tabla == 'exposicion') {
                        return 'Exposicion';
                    }
                    if ($model->tabla == 'producto_audiovisual') {
                        return 'Producto Audiovisual';
                    }
                    if ($model->tabla == 'otros') {
                        return 'Otros Productos';
                    }
                    if ($model->tabla == 'hecho') {
                        return 'Cronología';
                    }
                    if ($model->tabla == 'correspondencia') {
                        return 'Correspondencia';
                    }
                    if ($model->tabla == 'escrito') {
                        return 'Escrito';
                    }
                    if ($model->tabla == 'discurso') {
                        return 'Discurso y Entrevista';
                    }
                    if ($model->tabla == 'testimonio') {
                        return 'Testimonio';
                    }
                },
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => array('Escritos de Juventud' => 'Escritos de Juventud', 'Antologías' => 'Antologías', 'Memoria Histórica' => 'Memoria Histórica', 'Filosofía y Política' => 'Filosofía y Política', 'Economía Política' => 'Economía Política', 'De Divulgación General' => 'De Divulgación General', 'Lecturas sobre el pensamiento y la obra del Che' => 'Lecturas sobre el pensamiento y la obra del Che'),
            ],


            [
                'attribute' => 'id_tabla',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    if ($model->tabla == 'comentario') {
                        $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $model->id_tabla])->one();
                        for ($x = 0; $x <= 7; $x++) {
                            if ($modelpadre->tabla == 'noticia') {
                                return 'Actualidad';
                            }
                            if ($modelpadre->tabla == 'revista') {
                                return 'Revista';
                            }
                            if ($modelpadre->tabla == 'quienes') {
                                return 'Quienes Somoms';
                            }
                            if ($modelpadre->tabla == 'linea_investigacion') {
                                return 'Línea de Investigación';
                            }
                            if ($modelpadre->tabla == 'investigacion') {
                                return 'Investigación';
                            }
                            if ($modelpadre->tabla == 'articulo') {
                                return 'Artículo';
                            }
                            if ($modelpadre->tabla == 'gestion_documental') {
                                return 'Colección Documental';
                            }
                            if ($modelpadre->tabla == 'coleccion_documental') {
                                return 'Documento';
                            }
                            if ($modelpadre->tabla == 'proyecto') {
                                return 'Proyecto Editorial';
                            }
                            if ($modelpadre->tabla == 'libro') {
                                return 'Libro';
                            }
                            if ($modelpadre->tabla == 'curso_online') {
                                return 'Curso Online';
                            }
                            if ($modelpadre->tabla == 'clase') {
                                return 'Clase';
                            }
                            if ($modelpadre->tabla == 'taller') {
                                return 'Proyecto Comunitario';
                            }
                            if ($modelpadre->tabla == 'exposicion') {
                                return 'Exposicion';
                            }
                            if ($modelpadre->tabla == 'producto_audiovisual') {
                                return 'Producto Audiovisual';
                            }
                            if ($modelpadre->tabla == 'otros') {
                                return 'Otros Productos';
                            }
                            if ($modelpadre->tabla == 'hecho') {
                                return 'Cronología';
                            }
                            if ($modelpadre->tabla == 'correspondencia') {
                                return 'Correspondencia';
                            }
                            if ($modelpadre->tabla == 'escrito') {
                                return 'Escrito';
                            }
                            if ($modelpadre->tabla == 'discurso') {
                                return 'Discurso y Entrevista';
                            }
                            if ($modelpadre->tabla == 'testimonio') {
                                return 'Testimonio';
                            }
                            $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id' => $modelpadre->id_tabla])->one();
                        }
                        return 'Comentario';
                    }
                    if ($model->tabla == 'noticia') {
                        return 'Actualidad';
                    }
                    if ($model->tabla == 'revista') {
                        return 'Revista';
                    }
                    if ($model->tabla == 'quienes') {
                        return 'Quienes Somoms';
                    }
                    if ($model->tabla == 'linea_investigacion') {
                        return 'Línea de Investigación';
                    }
                    if ($model->tabla == 'investigacion') {
                        return 'Investigación';
                    }
                    if ($model->tabla == 'articulo') {
                        return Html::a('<span class="fa fa-eye "></span>', ['articulo/view', 'id'=>$model->id_tabla], [
                            'class' => 'btn btn-success',
                            "title" => "Ver"]);
                    }
                    if ($model->tabla == 'gestion_documental') {
                        return 'Colección Documental';
                    }
                    if ($model->tabla == 'coleccion_documental') {
                        return 'Documento';
                    }
                    if ($model->tabla == 'proyecto') {
                        return 'Proyecto Editorial';
                    }
                    if ($model->tabla == 'libro') {
                        return 'Libro';
                    }
                    if ($model->tabla == 'curso_online') {
                        return 'Curso Online';
                    }
                    if ($model->tabla == 'clase') {
                        return 'Clase';
                    }
                    if ($model->tabla == 'taller') {
                        return 'Proyecto Comunitario';
                    }
                    if ($model->tabla == 'exposicion') {
                        return 'Exposicion';
                    }
                    if ($model->tabla == 'producto_audiovisual') {
                        return 'Producto Audiovisual';
                    }
                    if ($model->tabla == 'otros') {
                        return 'Otros Productos';
                    }
                    if ($model->tabla == 'hecho') {
                        return 'Cronología';
                    }
                    if ($model->tabla == 'correspondencia') {
                        return 'Correspondencia';
                    }
                    if ($model->tabla == 'escrito') {
                        return 'Escrito';
                    }
                    if ($model->tabla == 'discurso') {
                        return 'Discurso y Entrevista';
                    }
                    if ($model->tabla == 'testimonio') {
                        return 'Testimonio';
                    }
                },
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => false,
            ],
            //'publico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <hr class="page_separator"/>

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Revisados</h4>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'clientOptions' => [
                        'autoclose' => true,

                    ],
                ]),
            ],
            'alias',
            //'correo',
            'comentario:ntext',
            'tabla',
            //'id_tabla',
            //'publico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <hr class="page_separator"/>
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Publicados</h4>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
                'filter' => \dosamigos\datepicker\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'clientOptions' => [
                        'autoclose' => true,

                    ],
                ]),
            ],
            'alias',
            //'correo',
            'comentario:ntext',
            'tabla',
            //'id_tabla',
            //'publico',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
