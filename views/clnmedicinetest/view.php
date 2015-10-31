<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicineTest */

$this->title = $model->MEDICINE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Medicine Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-medicine-test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->MEDICINE_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->MEDICINE_GEN_NO], [
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
            'MEDICINE_GEN_NO',
            'TRAN_INJ_GEN_NO',
            'CURE_GEN_NO',
            'EXPENSES',
            'UNIT_POINT',
            'DISCOUNT',
            'TOTAL',
            'VERSION',
            'UPDATE_BY',
            'UPDATE_DATE',
            'CREATE_DATE',
            'CREATE_BY',
        ],
    ]) ?>

</div>
