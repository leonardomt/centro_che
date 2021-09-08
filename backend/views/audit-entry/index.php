<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuditEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Audit Entries';
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
            'audit_entry_timestamp',
            'audit_entry_model_name',
            'audit_entry_operation',
            'audit_entry_field_name',
            'audit_entry_old_value:ntext',
            'audit_entry_new_value:ntext',
            'audit_entry_user_id',
            'audit_entry_ip',

        ],
    ]); ?>


</div>
