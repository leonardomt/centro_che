<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Articulo\ArticuloArchivo;
use frontend\models\Archivo\Archivo;
use frontend\models\Articulo\ArticuloComentario;


/* @var $this yii\web\View */
/* @var $model frontend\models\Articulo\Articulo */
\yii\web\YiiAsset::register($this);

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Artículos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$articuloarchivos = new ArticuloArchivo();
$articuloarchivos= ArticuloArchivo::find()->where(['id_articulo' => $model->id_articulo])->all();
$archivos = new Archivo();

?>

<div class="articulo-view">

    <?= \yii\bootstrap4\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'titulo',
            'autor',
            'fecha',
            'descripcion:ntext',
            'value'=>'tipoArticulo.tipo_articulo',
        ],
    ]) ?>


    <?php

    $articuloarchivos = new ArticuloArchivo();
    $articuloarchivos= ArticuloArchivo::find()->where(['id_articulo' => $model->id_articulo])->all();
    $archivos = new Archivo();
    ?>

    <?php foreach( $articuloarchivos as $artas): ?>
        <?php    $archivos = Archivo::find()->where(['id_archivo' => $artas->id_archivo ])->all()  ; ?>
        <?php foreach($archivos as $arc): ?>


            <div class="mb-3 pics animation all  " >
                <?php if($arc->tipo_archivo  == 3):?>
                    <video  controls autoplay style="width: 500px">
                        <source src="../../frontend/web/<?=$arc->url_archivo?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; if ($arc->tipo_archivo  == 1 ):?>
                    <img alt="picture" class="img-fluid img-fluid" style="width: 500px" src="../../frontend/web/<?=$arc->url_archivo?>">
                <?php endif; ?>

            </div>

            <br>

        <?php endforeach; ?>
    <?php endforeach; ?>

    <?= Html::a('<span class= "btn btn-success">Comentar</span>', ['comentario/create', 'tabla' => "articulo", 'id_tabla' => $model->id_articulo, 'back' => "articulo",  'back_id' => $model->id_articulo,], [
        'data' => [
            'method' => 'post',
        ],
        'title' => "Comentar"

    ]);?>
    <a class="btn btn-success" href="<?= Yii::$app->homeUrl ?>?r=comentario%2Fcreate&id=<?=$model->id_articulo?>" role="button">Comentar</a>

    <div class="row height d-flex ">
        <div class="col-md-7">
            <div class="card">
                <div class="p-3">
                    <h6>Commentarios</h6>
                </div>
                <?php
                $comentarios = \backend\models\Comentario\Comentario::find()->where(['tabla' => "articulo", 'id_tabla' => $model->id_articulo,])->all();
                ?>
                <?php foreach ($comentarios as $coment):?>
                <hr class="page_separator"/>
                <?php if($coment->publico == 1 || true):    //Cambiar ------------------?>
                <div class="mt-2">
                    <div class="d-flex flex-row p-3">
                        <img src="../web/img/quienessomos/user.jpg" width="40" height="40" class="rounded-circle mr-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="mr-2"><?=$coment->alias?></span>
                                </div>
                                <small><?=$coment->fecha?></small>
                                <small> <?= Html::a('<span class= "">Comentar</span>', ['comentario/create', 'tabla' => "comentario", 'id_tabla' => $coment->id, 'back' => "articulo", 'back_id' => $model->id_articulo ], [
                                        'data' => [
                                            'method' => 'post',
                                        ],
                                        'title' => "Comentar"

                                    ]);?>
                                </small>
                            </div>
                            <p class="text-justify comment-text mb-0"><?=$coment->comentario?></p>
                        </div>
                    </div>

                        <?php
                        $comentarios2 = \backend\models\Comentario\Comentario::find()->where(['tabla' => "comentario", 'id_tabla' => $coment->id,])->all();
                        ?>
                        <?php foreach ($comentarios2 as $coment2):?>
                            <div class="row">

                                <div class="col-md-3"></div>
                                <div class="mt-2">
                                <div class="d-flex flex-row p-3">
                                    <img src="../web/img/quienessomos/user.jpg" width="40" height="40" class="rounded-circle mr-3">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span class="mr-2"><?=$coment2->alias?></span>
                                            </div>
                                            <small><?=$coment2->fecha?></small>
                                            <small> <?= Html::a('<span class= "">Comentar</span>', ['comentario/create', 'tabla' => "comentario", 'id_tabla' => $coment2->id, 'back' => "articulo", 'back_id' => $model->id_articulo ], [
                                                    'data' => [
                                                        'method' => 'post',
                                                    ],
                                                    'title' => "Comentar"

                                                ]);?>
                                            </small>
                                        </div>
                                        <p class="text-justify comment-text mb-0"><?=$coment->comentario?></p>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <?php
                            $comentarios3 = \backend\models\Comentario\Comentario::find()->where(['tabla' => "comentario", 'id_tabla' => $coment2->id,])->all();
                            ?>
                            <?php foreach ($comentarios3 as $coment3):?>
                                <div class="row">

                                    <div class="col-md-6"></div>
                                    <div class="mt-2">
                                        <div class="d-flex flex-row p-3">
                                            <img src="../web/img/quienessomos/user.jpg" width="40" height="40" class="rounded-circle mr-3">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <span class="mr-2"><?=$coment3->alias?></span>
                                                    </div>
                                                    <small><?=$coment3->fecha?></small>

                                                </div>
                                                <p class="text-justify comment-text mb-0"><?=$coment->comentario?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                                <?php endforeach;?>


                <?php endif;?>

                <?php endforeach;?>
            </div>
        </div>
    </div>

    <br><br><br>



</div>
