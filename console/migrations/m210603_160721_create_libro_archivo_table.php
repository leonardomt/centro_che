<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%libro_archivo}}`.
 */
class m210603_160721_create_libro_archivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('libro_archivo', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('libro_archivo');
    }
}
