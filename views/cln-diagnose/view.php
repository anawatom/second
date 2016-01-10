<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnDiagnose */

$this->title = $model->DIAGNOSE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-diagnose-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->DIAGNOSE_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->DIAGNOSE_GEN_NO], [
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
            'DIAGNOSE_GEN_NO',
            'TRAN_INJ_GEN_NO',
            'DIAGNOSE_TYPE',
            'SPORT_GEN_NO',
            'BOND_GEN_NO',
            'CAUSE_GEN_NO',
            'CAUSE_OTHER',
            'DIAGNOSE',
            'DOCTOR_NAME',
            'VERSION',
            'UPDATE_BY',
            'UPDATE_DATE',
            'CREATE_BY',
            'CREATE_DATE',
        ],
    ]) ?>

</div>
