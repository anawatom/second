<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnSubActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Sub Activities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-sub-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Sub Activity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SUB_ACTIVITY_GEN_NO',
            'SPORT_GEN_NO',
            'ACTIVITY_DATE',
            'QTY_HEALTH',
            'QTY_AID',
            // 'QTY_DOC',
            // 'QTY_TRAIN',
            // 'CREATE_BY',
            // 'CREATE_DATE',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'VERSION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
