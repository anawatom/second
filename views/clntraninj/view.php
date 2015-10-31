<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInj */

$this->title = $model->TRAN_INJ_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-tran-inj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->TRAN_INJ_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->TRAN_INJ_GEN_NO], [
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
            'TRAN_INJ_GEN_NO',
            'REGISTER_GEN_NO',
            'TRAN_INJ_DATE',
            'VERSION',
            'UPDATE_BY',
            'UPDATE_DATE',
            'CREATE_DATE',
            'CREATE_BY',
        ],
    ]) ?>

</div>
