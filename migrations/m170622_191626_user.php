<?php

use yii\db\Migration;

class m170622_191626_user extends Migration
{
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned(),
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('user');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_191626_user cannot be reverted.\n";

        return false;
    }
    */
}
