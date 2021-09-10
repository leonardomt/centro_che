<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuditEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de Trazas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'audit_entry_id',
        [
            'attribute' => 'audit_entry_timestamp',
            'format' => ['date', 'php:Y-m-d H:i:s'],

        ],
        'audit_entry_user_name', 
        [
            'attribute' => 'audit_entry_model_name',                     // etapa
            'format' => 'raw',
            'headerOptions' => array('class' => 'col-md-2'),
            'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),

            'filter' => array("Archivo" => "Archivo", "Articulo" => "Articulo", "ArticuloArchivo" => "ArticuloArchivo", "AuthAssignment" => "AuthAssignment", "AuthItem" => "AuthItem", "AuthItemChild" => "AuthItemChild", "AuthItemChild" => "AuthItemChild", "AuthItem" => "AuthItem", "AuthRule" => "AuthRule", "Clase" => "Clase", "ColeccionDocumental" => "ColeccionDocumental", "ColeccionDocumentalArchivo" => "ColeccionDocumentalArchivo", "Comentario" => "Comentario", "Contacto" => "Contacto", "Correspondencia" => "Correspondencia", "CorrespondenciaArchivo" => "CorrespondenciaArchivo"),
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
        ],

        [
            'attribute' => 'audit_entry_operation',                     // etapa
            'format' => 'raw',
            'headerOptions' => array('class' => 'col-md-1'),
            'filter' => array("INSERTAR" => "INSERTAR", "MODIFICAR" => "MODIFICAR", "ELIMINAR" => "ELIMINAR"),
            'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
        ],
        [
            'attribute' => 'audit_entry_field_name',
            'contentOptions' => ['style' => 'max-width:100px; min-height:100px; overflow: auto; word-wrap: break-word;'],

        ],
        [
            'attribute' => 'audit_entry_old_value',
            'contentOptions' => ['style' => 'max-width:100px; min-height:100px; overflow: auto; word-wrap: break-word;'],
        ],
        [
            'attribute' => 'audit_entry_new_value',
            'contentOptions' => ['style' => 'max-width:100px; min-height:100px; overflow: auto; word-wrap: break-word;'],
        ],
        'audit_entry_model_id',
        'audit_entry_ip',
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'dropdownOptions' => [
            'label' => 'Exportar',
            'class' => 'btn btn-outline-secondary btn-default'
        ]
    ]) . "<hr>\n" .

        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]); ?>


</div>