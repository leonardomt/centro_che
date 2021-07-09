<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipo_producto}}`.
 */
class m210505_191648_create_tipo_producto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tipo_producto', [
            'id' => $this->primaryKey(),
            'tipo_producto' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tipo_producto');
    }
}
