<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-medicine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MEDICINE_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'CURE_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'EXPENSES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UNIT_POINT')->textInput() ?>

    <?= $form->field($model, 'DISCOUNT')->textInput() ?>

    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VERSION')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
