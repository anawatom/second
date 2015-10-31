<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStaff */

$this->title = $model->STAFF_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->STAFF_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->STAFF_ID], [
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
            'STAFF_ID',
            'TITLE_GEN_NO',
            'FIRST_NAME',
            'LAST_NAME',
            'GENDER',
            'BIRTH_DATE',
            'STAFF_TYPE',
            'CREATE_BY',
            'CREATE_DATE',
            'LAST_UPD_BY',
            'LAST_UPD_DATE',
        ],
    ]) ?>

</div>
