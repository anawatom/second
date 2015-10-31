<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnCauseInj */

$this->title = Yii::t('app', 'Create Cln Cause Inj');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cause Injs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cause-inj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
