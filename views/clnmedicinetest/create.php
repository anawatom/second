<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicineTest */

$this->title = Yii::t('app', 'Create Cln Medicine Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Medicine Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-medicine-test-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'cureItems' => $cureItems,
        'seqNumItems' => $seqNumItems,
    ]) ?>

</div>
