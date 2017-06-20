<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Quiz */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quizzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <form  id="questionForm" action="" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <?php foreach ($model->getQuizQuestions()->all() as $key => $row): ?>
            <div data-toggle="buttons" class="questionBlock">
                <label><p><?php echo "Question #".($key+1); ?></p></label>
                <?php foreach ($row->getQuizAnswers()->all() as $keyAnswer => $rowAnswer): ?>
                        <label class="btn btn-default btn-circle btn-lg "><input type="radio" name="q1[<?php echo $rowAnswer->id; ?>]" value="<?php echo $rowAnswer->quizQuestionId; ?>"><i class="glyphicon " ><?php echo $keyAnswer + 1; ?></i></label>
                <?php endforeach; ?>
            </div><br>
        <?php endforeach; ?>
        <p><div class="alert alert-danger error-answer" style="display: none" role="alert">You need to answer all questions</div></p>
        <button type="submit" class="btn btn-success">Save and finish</button>

    </form>

</div>



