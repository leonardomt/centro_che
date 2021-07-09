<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trabajador}}`.
 */
class m210602_182241_create_trabajador_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trabajador', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('trabajador');
    }
}
