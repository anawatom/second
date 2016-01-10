<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnCauseInjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Cause Injs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cause-inj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Cause Inj'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CAUSE_GEN_NO',
            'CAUSE_CODE',
            'CAUSE_NAME',
            'CAUSE_TYPE',
            'CREATE_BY',
            // 'CREATE_DATE',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'VERSION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
