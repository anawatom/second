<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnSport */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Sport',
]) . ' ' . $model->SPORT_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Sports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SPORT_GEN_NO, 'url' => ['view', 'id' => $model->SPORT_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-sport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
