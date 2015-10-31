<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjResp */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Tran Inj Resp',
]) . ' ' . $model->TRAN_INJ_RESP_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Inj Resps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TRAN_INJ_RESP_ID, 'url' => ['view', 'id' => $model->TRAN_INJ_RESP_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-tran-inj-resp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
