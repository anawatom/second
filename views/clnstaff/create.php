<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnStaff */

$this->title = Yii::t('app', 'Create Cln Staff');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'titleItems' => $titleItems,
        'staffTypeItems' => $staffTypeItems,
    ]) ?>

</div>
