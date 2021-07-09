<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipo_taller}}`.
 */
class m210505_154018_create_tipo_taller_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tipo_taller', [
            'id' => $this->primaryKey(),
            'tipo_taller' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tipo_taller');
    }
}
