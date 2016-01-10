<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnSport */

$this->title = $model->SPORT_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Sports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-sport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->SPORT_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->SPORT_GEN_NO], [
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
            'SPORT_GEN_NO',
            'SPORT_CODE',
            'SPORT_NAME',
            'CREATE_BY',
            'CREATE_DATE',
            'UPDATE_BY',
            'UPDATE_DATE',
            'VERSION',
        ],
    ]) ?>

</div>
