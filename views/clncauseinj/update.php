<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnCauseInj */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Cause Inj',
]) . ' ' . $model->CAUSE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cause Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CAUSE_GEN_NO, 'url' => ['view', 'id' => $model->CAUSE_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-cause-inj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
