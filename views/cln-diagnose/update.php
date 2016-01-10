<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnDiagnose */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Diagnose',
]) . ' ' . $model->DIAGNOSE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DIAGNOSE_GEN_NO, 'url' => ['view', 'id' => $model->DIAGNOSE_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-diagnose-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
