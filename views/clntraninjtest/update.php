<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjTest */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Tran Inj Test',
]) . ' ' . $model->TRAN_INJ_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Inj Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TRAN_INJ_GEN_NO, 'url' => ['view', 'id' => $model->TRAN_INJ_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-tran-inj-test-update">
    <?= $this->render('_form', [
        'model' => $model,
        'clnRegisterModel' => $clnRegisterModel ,
        'searchClnMedicineTestSearchModel' => $searchClnMedicineTestSearchModel,
        'dataClnMedicineTestProvider' => $dataClnMedicineTestProvider,
        'searchClnTranInjRespSearchModel' => $searchClnTranInjRespSearchModel,
        'dataClnTranInjRespProvider' => $dataClnTranInjRespProvider,        
    ]) ?>
</div>
