<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsfeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsfeeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsfeed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Newsfeed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'newsfeed_post',
            'newsfeed_comment',
            'attendee_id',
            'event_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
