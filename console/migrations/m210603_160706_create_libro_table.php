<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%libro}}`.
 */
class m210603_160706_create_libro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('libro', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('libro');
    }
}
