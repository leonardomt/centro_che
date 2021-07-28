<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Escrito\Escrito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escrito-form">

    <?php $form = ActiveForm::begin();
    ?>

 <br>

    <div class="row">
        <div  class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-content">
                        <div class="inbox-editor">
                           

                            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

                             <?=$form->field($model, 'tipo')->dropDownList(['Crónica'=>'Crónica','Poesía'=>'Poesía', 'Artículo'=>'Artículo', 'Apuntes de Lectura'=>'Apuntes de Lectura', 'Prólogo'=>'Prólogo', 'Ensayo'=>'Ensayo'],['prompt'=>'-']) ?>
                      

                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 2]) ?>

                            <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('revisar')):?>
                                        <?= $form->field($model, "revisado")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'revisado')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-6 text-lg-left">
                                    <?php if(Yii::$app->user->can('publicar')):?>
                                        <?= $form->field($model, "publico")->checkbox(); ?>
                                    <?php else: $x=0;?>
                                        <?=$form->field($model, 'publico')->hiddenInput(['value' => $x])->label(false) ?>
                                    <?php endif;?>
                                </div>
                            </div>


                            <div class="form-group">
                                <?= Html::submitButton('Siguiente', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>



<?php $form = \kartik\form\ActiveForm::begin(['id' => 'dynamic-form']); ?>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Addresses</h4></div>
    <div class="panel-body">
        <?php \wbraganca\dynamicform\DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 4, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelsArchivo[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'nota',
            ],
        ]); ?>

        <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsArchivo as $i => $modelArchivo): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Address</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (! $modelArchivo->isNewRecord) {
                            echo Html::activeHiddenInput($modelArchivo, "[{$i}]id");
                        }
                        ?>
                        <?= $form->field($modelArchivo, "[{$i}]nota")->textInput(['maxlength' => true]) ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php \wbraganca\dynamicform\DynamicFormWidget::end(); ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton($modelArchivo->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
</div>

<?php \kartik\form\ActiveForm::end(); ?>




</div>
