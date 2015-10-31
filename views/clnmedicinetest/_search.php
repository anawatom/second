<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicineTestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-medicine-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MEDICINE_GEN_NO') ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO') ?>

    <?= $form->field($model, 'CURE_GEN_NO') ?>

    <?= $form->field($model, 'EXPENSES') ?>

    <?= $form->field($model, 'UNIT_POINT') ?>

    <?php // echo $form->field($model, 'DISCOUNT') ?>

    <?php // echo $form->field($model, 'TOTAL') ?>

    <?php // echo $form->field($model, 'VERSION') ?>

    <?php // echo $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
