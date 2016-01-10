<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStandardTime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-standard-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STANDARD_TIME_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'DATE_BEGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATE_END')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTH_BEGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTH_END')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'YEAR_BEGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'YEAR_END')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STANDARD_TIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VERSION')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
