<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnTranInjTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Tran Inj Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-tran-inj-test-index">
    
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    'SHOW_REG_NO' ,
                    'SHOW_NAME' ,
                    [ 
                        'class' => '\kartik\grid\DataColumn',
                         'width' => '30%' ,
                        'attribute'=> 'TRAN_INJ_DATE', //'language' => 'th' ,
                        'value' =>  function ($model, $index, $widget) {
                                        Yii::$app->formatter->locale = 'th';
                                        return   Yii::$app->formatter->asDate($model->TRAN_INJ_DATE,'long');
                                    },
                        'filterType'=>GridView::FILTER_DATE,
                        'filterWidgetOptions' => [
                                'language' => 'th' ,
                                'pluginOptions'=>[
                                        'language' => 'th' ,
                                        'format' => 'dd MM yyyy',
                                        'displayFormat' => 'php:d-F-Y',
                                        'autoWidget' => true,
                                        'autoclose' => true,
                                        'todayBtn' => true,
                                        
                                ],
                                'options' => ['placeholder' => 'Select operating time ...' ,
                                             ] ,
                        ] ,     
                    ] ,                        
                    [       
                            'class' => 'kartik\grid\ActionColumn',
                            'width' => '5%',
                            'template' => '{update} {delete}',
                            'buttons' => [
                                            'delete' => function ($url, $model, $key) {
                                                            return Html::a  (   '<span class="glyphicon glyphicon-trash"></span>',
                                                                                '#', 
                                                                                [   'class' => 'delete-cln-tran-inj-test-button',
                                                                                    'title' => Yii::t('yii', 'Delete'),
                                                                                    'data-value' => 'index.php?r=clntraninjtest/delete&id='.$key,                    
                                                                                ]
                                                                            );           
                                                    }                                
                                        ]                                                
                       
                    ] ,                   

            ],
            'toolbar'=> [
                    [       'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])
                                        . ' ' .                       
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])          
                    ] ,                                                             
                    '{toggleData}',
                    '{export}',
            ] , 
            'export'=>['fontAwesome'=>true] ,
            'bordered'=>true,
            'striped'=>true,
            'condensed'=>true,
            'responsive'=>true,
            'hover'=>true,
            'showPageSummary'=>true,
            'panel'=> [
                    'heading' => 'รายการเข้ารับการรักษา', 
                    'type'=>GridView::TYPE_PRIMARY,
            ],
            'persistResize'=>false,       
            'export' => false,                                                                     
    ]); ?>

</div>
