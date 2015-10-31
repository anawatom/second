<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WAPROVINCE */

$this->title = 'Update Waprovince: ' . ' ' . $model->PROVINCE_CODE;
$this->params['breadcrumbs'][] = ['label' => 'Waprovinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROVINCE_CODE, 'url' => ['view', 'id' => $model->PROVINCE_CODE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="waprovince-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
