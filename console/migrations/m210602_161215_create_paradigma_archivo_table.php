<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paradigma_archivo}}`.
 */
class m210602_161215_create_paradigma_archivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('paradigma_archivo', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('paradigma_archivo');
    }
}
