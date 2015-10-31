<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnMedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Medicines');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-medicine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Medicine'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MEDICINE_GEN_NO',
            'TRAN_INJ_GEN_NO',
            'CURE_GEN_NO',
            'EXPENSES',
            'UNIT_POINT',
            // 'DISCOUNT',
            // 'TOTAL',
            // 'VERSION',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'CREATE_DATE',
            // 'CREATE_BY',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
