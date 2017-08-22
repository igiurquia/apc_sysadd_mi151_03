<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Venue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'venue_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_contact_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>