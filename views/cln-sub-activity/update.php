<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnSubActivity */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Sub Activity',
]) . ' ' . $model->SUB_ACTIVITY_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Sub Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SUB_ACTIVITY_GEN_NO, 'url' => ['view', 'id' => $model->SUB_ACTIVITY_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-sub-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
