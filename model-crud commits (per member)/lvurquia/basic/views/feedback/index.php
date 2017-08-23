<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'feedback_rating',
            'feedback_comment',
            [
            'attribute'=>'attendee_id',
            'value'=>'attendee.name'],
            [
            'attribute'=>'employee_id',
            'value'=>'employee.name'],
             [
            'attribute'=>'event_id',
            'value'=>'event.name'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
