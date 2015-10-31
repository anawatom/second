<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnStaff */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Staff',
]) . ' ' . $model->STAFF_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STAFF_ID, 'url' => ['view', 'id' => $model->STAFF_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'titleItems' => $titleItems,
        'staffTypeItems' => $staffTypeItems,
    ]) ?>

</div>
