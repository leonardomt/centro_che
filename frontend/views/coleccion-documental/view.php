<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\ColeccionDocumental\ColeccionDocumentalArchivo;
use frontend\models\Archivo\Archivo;
/* @var $this yii\web\View */
/* @var $model frontend\models\ColeccionDocumental\ColeccionDocumental */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Colección Documental', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);


$articuloarchivos = new ColeccionDocumentalArchivo();
$articuloarchivos= ColeccionDocumentalArchivo::find()->where(['id_coleccion_documental' => $model->id_coleccion_documental])->all();
$archivos = new Archivo();


?>
<div class="coleccion-documental-view">

    <?= \yii\bootstrap4\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'titulo:ntext',
            'descripcion:ntext',
        ],
    ]) ?>


    <?php

    $articuloarchivos = new ColeccionDocumentalArchivo();
    $articuloarchivos= ColeccionDocumentalArchivo::find()->where(['id_coleccion_documental' => $model->id_coleccion_documental])->all();
    $archivos = new Archivo();
    ?>

    <?php foreach( $articuloarchivos as $artas): ?>
        <?php    $archivos = Archivo::find()->where(['id_archivo' => $artas->id_archivo ])->all()  ; ?>
        <?php foreach($archivos as $arc): ?>


            <div class="mb-3 pics animation all  " >
                <a href="<?php echo Yii::$app->homeUrl?>?r=archivo%2Fview&id=<?=$arc->id_archivo?>">
                    <?php if($arc->tipo_archivo  == 3):?>
                        <video  controls autoplay style="width: 500px">
                            <source src="../../frontend/web/<?=$arc->url_archivo?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; if ($arc->tipo_archivo  == 1 ):?>
                        <img alt="picture" class="img-fluid img-fluid" style="width: 500px" src="../../frontend/web/<?=$arc->url_archivo?>">
                    <?php endif; ?>
                </a>

            </div>

            <br>

        <?php endforeach; ?>
    <?php endforeach; ?>


</div>
