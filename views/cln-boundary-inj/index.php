<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modelsClnBoundaryInjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Boundary Injs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-boundary-inj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Boundary Inj'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'BOND_GEN_NO',
            'BOND_CODE',
            'BOND_NAME',
            'CREATE_BY',
            'CREATE_DATE',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'VERSION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
