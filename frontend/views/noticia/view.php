<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Noticia\NoticiaArchivo;
use frontend\models\Archivo\Archivo;
/* @var $this yii\web\View */
/* @var $model frontend\models\Noticia\Noticia */

$this->title = $model->id_noticia;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$articuloarchivos = new NoticiaArchivo();
$articuloarchivos= NoticiaArchivo::find()->where(['id_noticia' => $model->id_noticia])->all();
$archivos = new Archivo();


?>
<div class="noticia-view">

    <?= \yii\bootstrap4\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_noticia',
            'revisado',
            'publico',
            'titulo_noticia:ntext',
            'fecha',
            'referencia:ntext',
            'descripcion:ntext',
        ],
    ]) ?>

    <div class="gallery" id="gallery">
        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox no-margin">
            <?php foreach( $articuloarchivos as $artas): ?>
                <?php    $archivos = Archivo::find()->where(['id_archivo' => $artas->id_archivo ])->all()  ; ?>
                <?php foreach($archivos as $arc): ?>

                    <figure class="">
                        <div class="mb-3 pics animation all 2">
                            <a href="<?php echo Yii::$app->homeUrl?>?r=archivo%2Fview&id=<?=$arc->id_archivo?>"  data-size="1600x1067">
                                <img alt="picture" class="img-fluid img-fluid" src="<?=$arc->url_archivo?>">
                            </a>
                        </div>
                    </figure>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <br>


</div>
