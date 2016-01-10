<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnCure */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Cure',
]) . ' ' . $model->CURE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CURE_GEN_NO, 'url' => ['view', 'id' => $model->CURE_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-cure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
