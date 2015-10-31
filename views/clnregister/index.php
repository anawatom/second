<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnRegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Registers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-register-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cln Register'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'REGISTER_GEN_NO',
            'REG_CODE',
            'REG_YEAR',
            'TITLE_GEN_NO',
            'NAME',
            // 'SNAME',
            // 'SEX',
            // 'AGE',
            // 'ADDRESS',
            // 'TEL',
            // 'OCCUPATION',
            // 'PLACE_OCCUPATION',
            // 'TEL_OCCUPATION',
            // 'TYPE_CARD',
            // 'ID_CARD',
            // 'ALLERGIC',
            // 'SHOW_REG_NO',
            // 'SHOW_NAME',
            // 'VERSION',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'CREATE_DATE',
            // 'CREATE_BY',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
