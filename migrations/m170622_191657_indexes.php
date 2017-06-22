<?php

use yii\db\Migration;

class m170622_191657_indexes extends Migration
{
    public function safeUp()
    {
        $this->createIndex(
            'idx-quiz-userId',
            'quiz',
            'userId'
        );

        $this->addForeignKey(
            'fk-quiz-userId',
            'quiz',
            'userId',
            'user',
            'id',
            'CASCADE'
        );
        ////
        $this->createIndex(
            'idx-quiz-quizId',
            'quizQuestion',
            'quizId'
        );

        $this->addForeignKey(
            'fk-quiz-quizId',
            'quizQuestion',
            'quizId',
            'quiz',
            'id',
            'CASCADE'
        );

        ////
        $this->createIndex(
            'idx-quizA-quizId',
            'quizAnswer',
            'quizQuestionId'
        );

        $this->addForeignKey(
            'fk-quizAns-quizId',
            'quizAnswer',
            'quizQuestionId',
            'quizQuestion',
            'id',
            'CASCADE'
        );

    }

    public function safeDown()
    {
        echo "m170622_191657_indexes cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_191657_indexes cannot be reverted.\n";

        return false;
    }
    */
}
