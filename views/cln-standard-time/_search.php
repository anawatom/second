<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStandardTimeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-standard-time-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'STANDARD_TIME_GEN_NO') ?>

    <?= $form->field($model, 'DATE_BEGIN') ?>

    <?= $form->field($model, 'DATE_END') ?>

    <?= $form->field($model, 'MONTH_BEGIN') ?>

    <?= $form->field($model, 'MONTH_END') ?>

    <?php // echo $form->field($model, 'YEAR_BEGIN') ?>

    <?php // echo $form->field($model, 'YEAR_END') ?>

    <?php // echo $form->field($model, 'STANDARD_TIME') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'VERSION') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
