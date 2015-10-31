<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WAPROVINCESEARCH */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waprovince-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROVINCE_CODE') ?>

    <?= $form->field($model, 'REGION_CODE') ?>

    <?= $form->field($model, 'ZONE_CODE') ?>

    <?= $form->field($model, 'PROVINCE_NAME_TH') ?>

    <?= $form->field($model, 'PROVINCE_NAME_EN') ?>

    <?php // echo $form->field($model, 'CREATE_USER_ID') ?>

    <?php // echo $form->field($model, 'CREATE_TIME') ?>

    <?php // echo $form->field($model, 'LAST_UPD_USER_ID') ?>

    <?php // echo $form->field($model, 'LAST_UPD_TIME') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
