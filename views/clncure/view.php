<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnCure */

$this->title = $model->CURE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cure-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->CURE_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->CURE_GEN_NO], [
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
            'CURE_GEN_NO',
            'CURE_CODE',
            'CURE_NAME',
            'CURE_EXPENSES',
            'CREATE_BY',
            'CREATE_DATE',
            'UPDATE_BY',
            'UPDATE_DATE',
            'VERSION',
        ],
    ]) ?>

</div>
