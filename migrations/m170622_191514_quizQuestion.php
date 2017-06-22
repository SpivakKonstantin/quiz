<?php

use yii\db\Migration;

class m170622_191514_quizQuestion extends Migration
{
    public function safeUp()
    {
        $this->createTable('quizQuestion', [
            'id' => $this->primaryKey()->unsigned(),
            'quizId' => $this->integer()->unsigned()->notNull(),
        ]);

    }

    public function safeDown()
    {
        echo "m170622_191514_quizQuestion cannot be reverted.\n";
        $this->dropTable('quizQuestion');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_191514_quizQuestion cannot be reverted.\n";

        return false;
    }
    */
}
