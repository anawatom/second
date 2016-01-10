<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnDiagnoseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Diagnoses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-diagnose-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Diagnose'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DIAGNOSE_GEN_NO',
            'TRAN_INJ_GEN_NO',
            'DIAGNOSE_TYPE',
            'SPORT_GEN_NO',
            'BOND_GEN_NO',
            // 'CAUSE_GEN_NO',
            // 'CAUSE_OTHER',
            // 'DIAGNOSE',
            // 'DOCTOR_NAME',
            // 'VERSION',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'CREATE_BY',
            // 'CREATE_DATE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
