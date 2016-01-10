<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnBoundaryInj */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Boundary Inj',
]) . ' ' . $model->BOND_GEN_NO;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Boundary Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BOND_GEN_NO, 'url' => ['view', 'id' => $model->BOND_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-boundary-inj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
