<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeria\GaleriaVO */


if($tipo == 1){
    $this->title = 'Fotografía';
}
if($tipo == 2){
    $this->title = 'Audio';
}
if($tipo == 3){
    $this->title = 'Video';
}
if($tipo == 4){
    $this->title = 'Homenaje';
}

$this->params['breadcrumbs'][] = ['label' => 'Galería Vida y Obra', 'url' => ['index', 'tipo'=>$tipo]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="galeria-vo-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= \common\widgets\Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_galeria_vo, 'tipo'=>$tipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_galeria_vo, 'tipo'=>$tipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if($tipo != 4){ echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
            ],

        ],
    ]) ;}?>

    <?php if($tipo == 4){ echo  DetailView::widget([
        'model' => $model,
        'attributes' => [
            'genero',
            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
            ],

        ],
    ]) ;} ?>


    <div>

        <div>
            <?php if($model->tipo_archivo  == 3):?>
                <video  controls autoplay>
                    <source src="../../frontend/web/<?=$model->id_archivo?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; if ($model->tipo_archivo  == 1 ):?>
                <img alt="picture" class="img-fluid img-fluid col-md-12" src="../../frontend/web/<?=$model->id_archivo?>">
            <?php endif; if ($model->tipo_archivo  == 2 ):?>

                <audio controls>
                    <source src="../../frontend/web/<?=$model->id_archivo?>">
                    Your browser does not support the <code>audio</code> element.
                </audio>

            <?php endif;?>
        </div>

    </div>

</div>
