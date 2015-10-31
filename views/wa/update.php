<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WA_ZONE */

$this->title = 'Update Wa  Zone: ' . ' ' . $model->ZONE_CODE;
$this->params['breadcrumbs'][] = ['label' => 'Wa  Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ZONE_CODE, 'url' => ['view', 'id' => $model->ZONE_CODE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wa--zone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
