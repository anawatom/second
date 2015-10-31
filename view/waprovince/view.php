<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WAPROVINCE */

$this->title = $model->PROVINCE_CODE;
$this->params['breadcrumbs'][] = ['label' => 'Waprovinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waprovince-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PROVINCE_CODE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PROVINCE_CODE], [
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
            'PROVINCE_CODE',
            'REGION_CODE',
            'ZONE_CODE',
            'PROVINCE_NAME_TH',
            'PROVINCE_NAME_EN',
            'CREATE_USER_ID',
            'CREATE_TIME',
            'LAST_UPD_USER_ID',
            'LAST_UPD_TIME',
        ],
    ]) ?>

</div>
