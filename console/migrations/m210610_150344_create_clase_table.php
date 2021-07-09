<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clase`.
 */
class m210610_150344_create_clase_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clase', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clase');
    }
}
