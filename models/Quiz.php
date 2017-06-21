<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $name
 * @property integer $result
 * @property integer $count
 *
 * @property User $user
 * @property QuizQuestion[] $quizQuestions
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'name', 'count'], 'required'],
            [['userId', 'result'], 'integer'],
            [['count'], 'integer', 'max' => 30, 'min' => 1],
            [['name'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'name' => 'Name',
            'result' => 'Result',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizQuestions()
    {
        return $this->hasMany(QuizQuestion::className(), ['quizId' => 'id']);
    }

    public function setAnswers($data){
        $correctCount = 0;
        $questionCount = $this->getQuizQuestions()->count();
        foreach ($this->getQuizQuestions()->all() as $qqRow){
            foreach ($quizAnswer = $qqRow->getQuizAnswers()->all() as $qaRow){
                if($qaRow->isCorrect == 1){
                    if(isset($data['q1'][$qaRow->id])){
                        $correctCount++;
                    }
                }
            }


        }

        $this->result = (int)($correctCount/$questionCount*100);

    }

    public function getTestResult(){
        return $this->result;
    }
}
