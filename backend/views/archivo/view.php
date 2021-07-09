<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\Archivo */

$this->title = $model->titulo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="archivo-view col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>

        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_archivo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'revisado',
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
            ],

            'titulo_archivo',
            'value'=>'tipoArchivo.tipo_archivo',
            'fecha',
            'etapa',
            'autor_archivo',
            'descripcion_archivo:ntext',

        ],


    ]) ?>

    <div>

        <div>
            <?php if($model->tipo_archivo  == 3):?>
                <video  controls autoplay>
                    <source src="../../frontend/web/<?=$model->url_archivo?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; if ($model->tipo_archivo  == 1 ):?>
                <img alt="picture" class="img-fluid img-fluid col-md-12" src="../../frontend/web/<?=$model->url_archivo?>">
            <?php endif; if ($model->tipo_archivo  == 2 ):?>

                <audio controls>
                    <source src="../../frontend/web/<?=$model->url_archivo?>">
                    Your browser does not support the <code>audio</code> element.
                </audio>

            <?php endif;?>
        </div>

    </div>

</div>
