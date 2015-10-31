<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjResp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-tran-inj-resp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TRAN_INJ_RESP_ID')->textInput() ?>

    <?= $form->field($model, 'STAFF_ID')->textInput() ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
