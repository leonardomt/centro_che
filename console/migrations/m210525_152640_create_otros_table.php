<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%otros}}`.
 */
class m210525_152640_create_otros_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('otro', [
            'id' => $this->primaryKey(),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('otros');
    }
}
