<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-staff-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'STAFF_ID') ?>

    <?= $form->field($model, 'TITLE_GEN_NO') ?>

    <?= $form->field($model, 'FIRST_NAME') ?>

    <?= $form->field($model, 'LAST_NAME') ?>

    <?= $form->field($model, 'GENDER') ?>

    <?php // echo $form->field($model, 'BIRTH_DATE') ?>

    <?php // echo $form->field($model, 'STAFF_TYPE') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'LAST_UPD_BY') ?>

    <?php // echo $form->field($model, 'LAST_UPD_DATE') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
