<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WAPROVINCE */

$this->title = 'Create Waprovince';
$this->params['breadcrumbs'][] = ['label' => 'Waprovinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waprovince-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
