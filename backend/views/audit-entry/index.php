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
<div class="audit-entry-index  col-md-12">

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
        [
            'attribute' => 'audit_entry_user_name',                     // etapa
            'format' => 'raw',
            'headerOptions' => array('class' => 'col-md-2'),
            'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            'filter' => \yii\helpers\ArrayHelper::map(\backend\models\User\User::find()->all(), 'username', 'username'),

            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'options' => ['prompt' => ''],
                'pluginOptions' => ['allowClear' => true],
            ],
        ],

        [
            'attribute' => 'audit_entry_model_name',                     // etapa
            'format' => 'raw',
            'headerOptions' => array('class' => 'col-md-2'),
            'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),

            'filter' => array("Archivo" => "Archivo", "Articulo" => "Articulo", "ArticuloArchivo" => "ArticuloArchivo",
                "AuthAssignment" => "AuthAssignment", "AuthItem" => "AuthItem", "AuthItemChild" => "AuthItemChild",
                "AuthRule" => "AuthRule", "Clase" => "Clase", "ColeccionDocumental" => "ColeccionDocumental",
                "ColeccionDocumentalArchivo" => "ColeccionDocumentalArchivo", "Comentario" => "Comentario",
                "Contacto" => "Contacto", "Correspondencia" => "Correspondencia",
                "CorrespondenciaArchivo" => "CorrespondenciaArchivo", "CursoOnlineArchivo" => "CursoOnlineArchivo",
                "CursoOnline" => "CursoOnline", "DiscursoArchivo" => "DiscursoArchivo", "Discurso" => "Discurso",
                "EscritoArchivo" => "EscritoArchivo", "Escrito" => "Escrito", "ExposicionArchivo" => "ExposicionArchivo",
                "Exposicion" => "Exposicion", "GaleriaVoArchivo" => "GaleriaVoArchivo", "GaleriaVo" => "GaleriaVo",
                "GestionDocumentalArchivo" => "GestionDocumentalArchivo", "GestionDocumental" => "GestionDocumental",
                "HechoArchivo" => "HechoArchivo", "Hecho" => "Hecho", "HomenajeArchivo" => "HomenajeArchivo",
                "Homenaje" => "Homenaje", "InvestigacionArchivo" => "InvestigacionArchivo",
                "Investigacion" => "Investigacion", "LibroArchivo" => "LibroArchivo", "Libro" => "Libro",
                "LineaInvestigacionArchivo" => "LineaInvestigacionArchivo", "LineaInvestigacion" => "LineaInvestigacion",
                "NoticiaArchivo" => "NoticiaArchivo", "Noticia" => "Noticia", "OtrosArchivo" => "OtrosArchivo",
                "Otros" => "Otros", "ParadigmaArchivo" => "ParadigmaArchivo", "Paradigma" => "Paradigma",
                "ProductoAudiovisualArchivo" => "ProductoAudiovisualArchivo", "ProductoAudiovisual" => "ProductoAudiovisual",
                "ProgramacionArchivo" => "ProgramacionArchivo", "Programacion" => "Programacion",
                "ProyectoArchivo" => "ProyectoArchivo", "Proyecto" => "Proyecto", "QuienesArchivo" => "QuienesArchivo",
                "Quienes" => "Quienes", "RevistaArchivo" => "RevistaArchivo", "Revista" => "Revista",
                "TallerArchivo" => "TallerArchivo", "Taller" => "Taller", "TestimonioArchivo" => "TestimonioArchivo",
                "Testimonio" => "Testimonio", "TipoArchivo" => "TipoArchivo", "TipoArticulo" => "TipoArticulo",
                "TipoHomenaje" => "TipoHomenaje", "TipoProducto" => "TipoProducto", "TipoTaller" => "TipoTaller",
                "Trabajador" => "Trabajador", "User" => "User"),


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
        'showConfirmAlert'=> false, 
        'dropdownOptions' => [
            'label' => 'Exportar',
            'class' => 'btn btn-outline-secondary btn-default'
        ]
    ]) . "<hr>\n" .

        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'id' => 'audit-entry-index',
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,

            ],

            'columns' => $gridColumns,
        ]); ?>


</div>