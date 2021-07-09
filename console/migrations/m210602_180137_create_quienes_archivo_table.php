<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quienes_archivo}}`.
 */
class m210602_180137_create_quienes_archivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quienes_archivo', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('quienes_archivo');
    }
}
