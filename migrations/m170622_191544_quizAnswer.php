<?php

use yii\db\Migration;

class m170622_191544_quizAnswer extends Migration
{
    public function safeUp()
    {
        $this->createTable('quizAnswer', [
            'id' => $this->primaryKey()->unsigned(),
            'quizQuestionId' => $this->integer()->unsigned()->notNull(),
            'isCorrect' => $this->boolean()->notNull()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('quizAnswer');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_191544_quizAnswer cannot be reverted.\n";

        return false;
    }
    */
}
