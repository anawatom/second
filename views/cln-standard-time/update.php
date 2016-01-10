<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStandardTime */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Standard Time',
]) . ' ' . $model->STANDARD_TIME_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Standard Times'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STANDARD_TIME_GEN_NO, 'url' => ['view', 'id' => $model->STANDARD_TIME_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-standard-time-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
