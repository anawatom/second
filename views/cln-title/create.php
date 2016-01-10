<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnTitle */

$this->title = Yii::t('app', 'Create Cln Title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
