<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClnRegister */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->REGISTER_GEN_NO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->REGISTER_GEN_NO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'REGISTER_GEN_NO',
            'REG_CODE',
            'REG_YEAR',
            'TITLE_GEN_NO',
            'NAME',
            'SNAME',
            'SEX',
            'AGE',
            'ADDRESS',
            'TEL',
            'OCCUPATION',
            'PLACE_OCCUPATION',
            'TEL_OCCUPATION',
            'TYPE_CARD',
            'ID_CARD',
            'ALLERGIC',
            'SHOW_REG_NO',
            'SHOW_NAME',
            'VERSION',
            'UPDATE_BY',
            'UPDATE_DATE',
            'CREATE_DATE',
            'CREATE_BY',
        ],
    ]) ?>

</div>
