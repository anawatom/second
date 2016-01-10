<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnRegister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'REGISTER_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'REG_CODE')->textInput() ?>

    <?= $form->field($model, 'REG_YEAR')->textInput() ?>

    <?= $form->field($model, 'TITLE_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AGE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ADDRESS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OCCUPATION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLACE_OCCUPATION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TEL_OCCUPATION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TYPE_CARD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_CARD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALLERGIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SHOW_REG_NO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SHOW_NAME')->textInput(['maxlength' => true]) ?>

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
