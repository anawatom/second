<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnStandardTime */

$this->title = Yii::t('app', 'Create Cln Standard Time');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Standard Times'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-standard-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
