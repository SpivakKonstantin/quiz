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

        $this->createTable('quizQuestion', [
            'id' => $this->primaryKey()->unsigned(),
            'quizId' => $this->integer()->unsigned()->notNull(),
        ]);

        $this->createTable('quizAnswer', [
            'id' => $this->primaryKey()->unsigned(),
            'quizQuestionId' => $this->integer()->unsigned()->notNull(),
            'isCorrect' => $this->boolean()->notNull()
        ]);

        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned(),
        ]);


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

        $this->insert('user', [
            'id' => '2',
        ]);

    }

    public function safeDown()
    {
        echo "m170617_115106_carcas cannot be reverted.\n";
        $this->dropTable('quizQuestion');
        $this->dropTable('quizAnswer');
        $this->dropTable('quiz');
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
        echo "m170617_115106_carcas cannot be reverted.\n";

        return false;
    }
    */
}
