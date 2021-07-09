<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m210520_161752_gestion_documental_arachivo_table
 */
class m210520_161752_gestion_documental_arachivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gestion_documental_archivo', [
            'id' => $this->primaryKey(),
            'descripcion' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210520_161752_gestion_documental_arachivo_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210520_161752_gestion_documental_arachivo_table cannot be reverted.\n";

        return false;
    }
    */
}
