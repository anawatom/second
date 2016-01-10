<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnSubActivity */

$this->title = Yii::t('app', 'Create Cln Sub Activity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Sub Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-sub-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
