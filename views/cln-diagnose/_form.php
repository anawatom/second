<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnDiagnose */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-diagnose-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DIAGNOSE_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'DIAGNOSE_TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SPORT_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'BOND_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'CAUSE_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'CAUSE_OTHER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIAGNOSE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DOCTOR_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VERSION')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
