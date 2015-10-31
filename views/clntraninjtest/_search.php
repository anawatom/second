<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjTestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-tran-inj-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO') ?>

    <?= $form->field($model, 'REGISTER_GEN_NO') ?>

    <?= $form->field($model, 'TRAN_INJ_DATE') ?>

    <?= $form->field($model, 'VERSION') ?>

    <?= $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <?php // echo $form->field($model, 'REGIS_TIME') ?>

    <?php // echo $form->field($model, 'WAIT_TRAN_TIME') ?>

    <?php // echo $form->field($model, 'TRAN_TIME') ?>

    <?php // echo $form->field($model, 'RECV_MEDIC_TIME') ?>

    <?php // echo $form->field($model, 'PAID_TIME') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
