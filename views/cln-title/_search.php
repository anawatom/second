<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTitleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-title-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TITLE_GEN_NO') ?>

    <?= $form->field($model, 'TITLE_CODE') ?>

    <?= $form->field($model, 'TITLE_NAME') ?>

    <?= $form->field($model, 'CREATE_BY') ?>

    <?= $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'VERSION') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
