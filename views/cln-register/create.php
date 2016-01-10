<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClnRegister */

$this->title = Yii::t('app', 'Create Cln Register');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
