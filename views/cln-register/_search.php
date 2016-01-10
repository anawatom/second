<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClnRegisterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'REGISTER_GEN_NO') ?>

    <?= $form->field($model, 'REG_CODE') ?>

    <?= $form->field($model, 'REG_YEAR') ?>

    <?= $form->field($model, 'TITLE_GEN_NO') ?>

    <?= $form->field($model, 'NAME') ?>

    <?php // echo $form->field($model, 'SNAME') ?>

    <?php // echo $form->field($model, 'SEX') ?>

    <?php // echo $form->field($model, 'AGE') ?>

    <?php // echo $form->field($model, 'ADDRESS') ?>

    <?php // echo $form->field($model, 'TEL') ?>

    <?php // echo $form->field($model, 'OCCUPATION') ?>

    <?php // echo $form->field($model, 'PLACE_OCCUPATION') ?>

    <?php // echo $form->field($model, 'TEL_OCCUPATION') ?>

    <?php // echo $form->field($model, 'TYPE_CARD') ?>

    <?php // echo $form->field($model, 'ID_CARD') ?>

    <?php // echo $form->field($model, 'ALLERGIC') ?>

    <?php // echo $form->field($model, 'SHOW_REG_NO') ?>

    <?php // echo $form->field($model, 'SHOW_NAME') ?>

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
