<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WA_ZONE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wa--zone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ZONE_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ZONE_NAME_TH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ZONE_NAME_EN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_TIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAST_UPD_USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAST_UPD_TIME')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
