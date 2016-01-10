<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnCauseInj */

$this->title = $model->CAUSE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cause Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cause-inj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->CAUSE_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->CAUSE_GEN_NO], [
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
            'CAUSE_GEN_NO',
            'CAUSE_CODE',
            'CAUSE_NAME',
            'CAUSE_TYPE',
            'CREATE_BY',
            'CREATE_DATE',
            'UPDATE_BY',
            'UPDATE_DATE',
            'VERSION',
        ],
    ]) ?>

</div>
