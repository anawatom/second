<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WA_ZONE */

$this->title = 'Create Wa  Zone';
$this->params['breadcrumbs'][] = ['label' => 'Wa  Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wa--zone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
