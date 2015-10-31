<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WAPROVINCESEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waprovinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waprovince-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Waprovince', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PROVINCE_CODE',
            'REGION_CODE',
            'ZONE_CODE',
            'PROVINCE_NAME_TH',
            'PROVINCE_NAME_EN',
            // 'CREATE_USER_ID',
            // 'CREATE_TIME',
            // 'LAST_UPD_USER_ID',
            // 'LAST_UPD_TIME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
