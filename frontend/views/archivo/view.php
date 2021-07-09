<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\Archivo */

$this->title = $model->titulo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="archivo-view">
    <br><br><br><br>
    <?= \yii\bootstrap4\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo_archivo',
            'autor_archivo',
            'descripcion_archivo:ntext',
        ],
    ]) ?>


    <?php $src = $model->url_archivo; ?>

    <div class="gallery" id="gallery">
        <div id="mdb-lightbox-ui"></div>
        <div class="mdb-lightbox no-margin">

            <?php if($model->tipo_archivo  == 3):?>
                <video  controls autoplay>
                    <source src="<?=$model->url_archivo?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; if ($model->tipo_archivo  == 1 ):?>
                <img alt="picture" class="img-fluid img-fluid" src="<?=$model->url_archivo?>">
            <?php endif; ?>
        </div>
    </div>
    <br><br><br><br><br>


    <br><br><br><br><br>
</div>

