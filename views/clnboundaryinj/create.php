<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnBoundaryInj */

$this->title = Yii::t('app', 'Create Cln Boundary Inj');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Boundary Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-boundary-inj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
