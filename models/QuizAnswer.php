<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quizAnswer".
 *
 * @property integer $id
 * @property integer $quizQuestionId
 * @property integer $isCorrect
 *
 * @property QuizQuestion $quizQuestion
 */
class QuizAnswer extends \yii\db\ActiveRecord
{
    const ANSWER_MIN = 2;
    const ANSWER_MAX = 5;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quizAnswer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizQuestionId', 'isCorrect'], 'required'],
            [['quizQuestionId', 'isCorrect'], 'integer'],
            [['quizQuestionId'], 'exist', 'skipOnError' => true, 'targetClass' => QuizQuestion::className(), 'targetAttribute' => ['quizQuestionId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quizQuestionId' => 'Quiz Question ID',
            'isCorrect' => 'Is Correct',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizQuestion()
    {
        return $this->hasOne(QuizQuestion::className(), ['id' => 'quizQuestionId']);
    }
}
