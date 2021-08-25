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
if (Yii::$app->user->isGuest)
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
        <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id_archivo], ['class' => 'btn btn-primary', 'title' => "Modificar", 'style' => "width: 40px; height: 40px",]) ?>
        <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id_archivo], [
            'class' => 'btn btn-danger',
            'title' => "Eliminar",
            'style' => "width: 40px; height: 40px",
            'data' => [
                'confirm' => '¿Estas seguro que deseas eliminar este elemento?',
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
                    return $model->revisado ? 'Sí' : 'No';
                },
            ],

            'titulo_archivo',

            [
                'attribute' => 'tipo_archivo',
                'value' => \backend\models\Archivo\TipoArchivo::findOne(['id_linea_investigacion', $model->tipo_archivo])->tipo_archivo,
            ],

            'fecha',
            'etapa',
            'autor_archivo',
            'descripcion_archivo:ntext',

        ],


    ]) ?>

    <div>

        <div>
            <?php if ($model->tipo_archivo == 3): ?>
                <video controls autoplay>
                    <source src="../../frontend/web/<?= $model->url_archivo ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif;
            if ($model->tipo_archivo == 1): ?>
                <div style="width: 300px;height: 300px;background-size: cover;background-repeat: no-repeat;background-position: center;">
                    <img alt="picture" class="img-fluid img-fluid col-md-12" style=""
                         src="../../frontend/web/<?= $model->url_archivo ?>">
                </div>
            <?php endif;
            if ($model->tipo_archivo == 2): ?>

                <audio controls>
                    <source src="../../frontend/web/<?= $model->url_archivo ?>">
                    Your browser does not support the <code>audio</code> element.
                </audio>

            <?php endif; ?>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>

</div>
