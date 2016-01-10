<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStandardTime */

$this->title = $model->STANDARD_TIME_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Standard Times'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-standard-time-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->STANDARD_TIME_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->STANDARD_TIME_GEN_NO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'STANDARD_TIME_GEN_NO:datetime',
            'DATE_BEGIN',
            'DATE_END',
            'MONTH_BEGIN',
            'MONTH_END',
            'YEAR_BEGIN',
            'YEAR_END',
            'STANDARD_TIME',
            'CREATE_BY',
            'CREATE_DATE',
            'UPDATE_BY',
            'UPDATE_DATE',
            'VERSION',
        ],
    ]) ?>

</div>
