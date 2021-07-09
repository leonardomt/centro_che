<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacto}}`.
 */
class m210602_182224_create_contacto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacto', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacto');
    }
}
