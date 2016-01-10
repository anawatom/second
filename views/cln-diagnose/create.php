<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnDiagnose */

$this->title = Yii::t('app', 'Create Cln Diagnose');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-diagnose-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
