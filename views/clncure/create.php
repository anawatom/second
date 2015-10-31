<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnCure */

$this->title = Yii::t('app', 'Create Cln Cure');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Cures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
