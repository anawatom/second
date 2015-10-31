<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInj */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Tran Inj',
]) . ' ' . $model->TRAN_INJ_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TRAN_INJ_GEN_NO, 'url' => ['view', 'id' => $model->TRAN_INJ_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-tran-inj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelClnDiagnose' => $modelClnDiagnose ,
        'sportItems' => $sportItems ,
        'causeItems' => $causeItems ,
        'bondItems' => $bondItems ,
                'searchClnMedicineTestSearchModel' => $searchClnMedicineTestSearchModel,
                'dataClnMedicineTestProvider' => $dataClnMedicineTestProvider,
    ]) ?>

</div>
