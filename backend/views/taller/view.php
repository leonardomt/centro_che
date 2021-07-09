<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Taller\TallerArchivo;
use backend\models\Archivo\Archivo;
/* @var $this yii\web\View */
/* @var $model backend\models\Taller\Taller */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Talleres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$articuloarchivos = new TallerArchivo();
$articuloarchivos= TallerArchivo::find()->where(['id_taller' => $model->id_taller])->all();
$archivos = new Archivo();
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-taller'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

\yii\web\YiiAsset::register($this);
?>
<div class="taller-view col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_taller], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_taller], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que deceas eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
            ],
            'nombre:ntext',
            'encargado:ntext',
            'contacto:ntext',
            'descripcion:ntext',

        ],
    ]) ?>

    <?php

    $articuloarchivos = new TallerArchivo();
    $articuloarchivos= TallerArchivo::find()->where(['id_taller' => $model->id_taller])->all();
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