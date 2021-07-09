<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carrusel}}`.
 */
class m210602_140505_create_carrusel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('carrusel', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('carrusel');
    }
}
