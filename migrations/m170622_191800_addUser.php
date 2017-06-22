<?php

use yii\db\Migration;

class m170622_191800_addUser extends Migration
{
    public function safeUp()
    {

        $this->insert('user', [
            'id' => '2',
        ]);
    }

    public function safeDown()
    {
        echo "m170622_191800_addUser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_191800_addUser cannot be reverted.\n";

        return false;
    }
    */
}
