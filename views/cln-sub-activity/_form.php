<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnSubActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-sub-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SUB_ACTIVITY_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'SPORT_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'ACTIVITY_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QTY_HEALTH')->textInput() ?>

    <?= $form->field($model, 'QTY_AID')->textInput() ?>

    <?= $form->field($model, 'QTY_DOC')->textInput() ?>

    <?= $form->field($model, 'QTY_TRAIN')->textInput() ?>

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
