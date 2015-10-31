<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjResp */

$this->title = Yii::t('app', 'Create Cln Tran Inj Resp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Inj Resps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-tran-inj-resp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
