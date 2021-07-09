<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quienes}}`.
 */
class m210602_180120_create_quienes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quienes', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('quienes');
    }
}
