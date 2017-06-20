<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quizQuestion".
 *
 * @property integer $id
 * @property integer $quizId
 *
 * @property QuizAnswer[] $quizAnswers
 * @property Quiz $quiz
 */
class QuizQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quizQuestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizId'], 'required'],
            [['quizId'], 'integer'],
            [['quizId'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::className(), 'targetAttribute' => ['quizId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quizId' => 'Quiz ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizAnswers()
    {
        return $this->hasMany(QuizAnswer::className(), ['quizQuestionId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['id' => 'quizId']);
    }
}
