<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attendee */

$this->title = 'Create Attendee';
$this->params['breadcrumbs'][] = ['label' => 'Attendees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
