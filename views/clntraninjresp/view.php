<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjResp */

$this->title = $model->TRAN_INJ_RESP_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Inj Resps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-tran-inj-resp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->TRAN_INJ_RESP_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->TRAN_INJ_RESP_ID], [
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
            'TRAN_INJ_RESP_ID',
            'STAFF_ID',
            'CREATE_BY',
            'CREATE_DATE',
            'TRAN_INJ_GEN_NO',
        ],
    ]) ?>

</div>
