<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\CursoOnline */

$this->title = 'Insertar Curso Online';
$this->params['breadcrumbs'][] = ['label' => 'Curso Online', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if (!Yii::$app->user->can('gestionar-curso-online'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="curso-online-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>


    <?php $form = \kartik\form\ActiveForm::begin(['id' => 'dynamic-form']); ?>


    <div class="row">
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 text-lg-left">
            <?= $form->field($model, 'coordinador')->textInput() ?>

        </div>
    </div>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

    <?= $form->field($model, 'enlace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(
        \kartik\file\FileInput::classname(),
        [
            'pluginOptions' => [
                'showUpload' => false,'showRemove' => false,'showCancel' => false,
                'browseLabel' => 'Insertar PDF',
                'removeLabel' => '',
                'mainClass' => 'input-group-md',
                'allowedFileExtensions' => ['pdf'],
                'maxFileSize' => 20048,
                'msgSizeTooLarge' => 'El archivo supera el límite permitido de <b>20mb</b>.',
            ],

        ]
    ); ?>



    <div class="panel panel-default">

        <div class="panel-body">
            <?php \wbraganca\dynamicform\DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsClase[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nota',
                ],
            ]); ?>

            <div class="container-items">
                <!-- widgetContainer -->
                <?php foreach ($modelsClase as $i => $modelClase) : ?>
                    <div class="item panel panel-default">
                        <!-- widgetBody -->
                        <div class="panel-heading">

                            <?php
                            $x = 0;
                            if ($x == 0) $titulo = "Clase";

                            ?>

                            <h3 class="panel-title pull-left"><?= $titulo ?></h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelClase->isNewRecord) {
                                echo Html::activeHiddenInput($modelClase, "[{$i}]id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($modelClase, "[{$i}]titulo")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?= $form->field($modelClase, "[{$i}]profesor")->textInput() ?>

                                </div>
                            </div>

                            <?= $form->field($modelClase, "[{$i}]descripcion")->textarea(['rows' => 2,'style' => 'resize:none']) ?>

                            <?= $form->field($modelClase, "[{$i}]enlace")->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                <?php $x++;
                endforeach; ?>
            </div>

            <div class="row panel-heading">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <?php if (Yii::$app->user->can('revisar')) : ?>
                        <?= $form->field($model, "revisado")->checkbox(); ?>
                    <?php else : $x = 0; ?>
                        <?= $form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 ">
                    <?php if (Yii::$app->user->can('publicar')) : ?>
                        <?= $form->field($model, "publico")->checkbox(); ?>
                    <?php else : $x = 0; ?>
                        <?= $form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <?= Html::submitButton($modelClase->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i>' : '<i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <?php \wbraganca\dynamicform\DynamicFormWidget::end(); ?>
        </div>
    </div>


    <?php \kartik\form\ActiveForm::end(); ?>





</div>