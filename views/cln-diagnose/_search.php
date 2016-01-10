<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnDiagnoseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-diagnose-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DIAGNOSE_GEN_NO') ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO') ?>

    <?= $form->field($model, 'DIAGNOSE_TYPE') ?>

    <?= $form->field($model, 'SPORT_GEN_NO') ?>

    <?= $form->field($model, 'BOND_GEN_NO') ?>

    <?php // echo $form->field($model, 'CAUSE_GEN_NO') ?>

    <?php // echo $form->field($model, 'CAUSE_OTHER') ?>

    <?php // echo $form->field($model, 'DIAGNOSE') ?>

    <?php // echo $form->field($model, 'DOCTOR_NAME') ?>

    <?php // echo $form->field($model, 'VERSION') ?>

    <?php // echo $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
