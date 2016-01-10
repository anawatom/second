<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnTitle */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Title',
]) . ' ' . $model->TITLE_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITLE_GEN_NO, 'url' => ['view', 'id' => $model->TITLE_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
