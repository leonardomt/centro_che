<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%otros_archivo}}`.
 */
class m210525_153539_create_otros_archivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('otros_archivo', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('otros_archivo');
    }
}
