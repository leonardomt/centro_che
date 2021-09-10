<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuditEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de Trazas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'audit_entry_id',
            [
                'attribute' => 'audit_entry_timestamp',
                'format' => ['date', 'php:Y-m-d H:i:s'],

            ],
            'audit_entry_model_name',
            'audit_entry_operation',
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
            'audit_entry_user_name',
            'audit_entry_ip',
            'audit_entry_model_id',

        ],
    ]); ?>


</div>
