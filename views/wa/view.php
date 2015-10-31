<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WA_ZONE */

$this->title = $model->ZONE_CODE;
$this->params['breadcrumbs'][] = ['label' => 'Wa  Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wa--zone-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ZONE_CODE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ZONE_CODE], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ZONE_CODE',
            'ZONE_NAME_TH',
            'ZONE_NAME_EN',
            'CREATE_USER_ID',
            'CREATE_TIME',
            'LAST_UPD_USER_ID',
            'LAST_UPD_TIME',
        ],
    ]) ?>

</div>
