<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnSportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Sports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-sport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Sport'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SPORT_GEN_NO',
            'SPORT_CODE',
            'SPORT_NAME',
            'CREATE_BY',
            'CREATE_DATE',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'VERSION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
