<?php

use yii\db\Migration;

class m170617_115106_carcas extends Migration
{
    public function safeUp()
    {
        $this->createTable('quiz', [
            'id' => $this->primaryKey()->unsigned(),
            'userId' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string(255)->notNull(),
            'result' => $this->integer(),
            'count' => $this->integer()->notNull()
        ]);

    }

    public function safeDown()
    {
        echo "m170617_115106_carcas cannot be reverted.\n";


        $this->dropTable('quiz');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170617_115106_carcas cannot be reverted.\n";

        return false;
    }
    */
}
