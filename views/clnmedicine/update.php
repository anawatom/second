<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicine */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Medicine',
]) . ' ' . $model->MEDICINE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Medicines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MEDICINE_GEN_NO, 'url' => ['view', 'id' => $model->MEDICINE_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-medicine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
