<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paradigma}}`.
 */
class m210602_160209_create_paradigma_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('paradigma', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('paradigma');
    }
}
