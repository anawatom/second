<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClnRegister */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cln Register',
]) . ' ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->REGISTER_GEN_NO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cln-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
