<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnSubActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-sub-activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SUB_ACTIVITY_GEN_NO') ?>

    <?= $form->field($model, 'SPORT_GEN_NO') ?>

    <?= $form->field($model, 'ACTIVITY_DATE') ?>

    <?= $form->field($model, 'QTY_HEALTH') ?>

    <?= $form->field($model, 'QTY_AID') ?>

    <?php // echo $form->field($model, 'QTY_DOC') ?>

    <?php // echo $form->field($model, 'QTY_TRAIN') ?>

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
