<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\grid\DataColumn;



use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnRegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Registers');
$this->params['breadcrumbs'][] = $this->title;
?>


 
<div class="cln-select-register-index"> 
    <?php Pjax::begin([ 'id'=>'pjax-select-register-index','timeout' => false,  'enablePushState' => false]); ?>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    'SHOW_REG_NO',
                    [   'attribute'=>'SHOW_NAME',
                        'value'=>function ($model, $key, $index, $widget) {
                                        return Html::a( $model->SHOW_NAME, 'javascript:selectRegis('.$key.',"'.str_replace(array("'", "\"", "&quot;"), "", $model->SHOW_NAME ).'","'.str_replace(array("'", "\"", "&quot;"), "", $model->SHOW_REG_NO ).'","'.str_replace(array("'", "\"", "&quot;"), "", $model->AGE ).'","'.str_replace(array("'", "\"", "&quot;"), "", $model->ALLERGIC ).'")') ;
                                },
                        'format'=>'raw',        
                    ], 

            ],
            'containerOptions'=> [
                    'style'=>'overflow: auto'
            ], 
            'headerRowOptions'=> [
                    'class'=>'kartik-sheet-style'
            ],
          
            'export'=>['fontAwesome'=>true] ,
            'bordered'=>true,
            'striped'=>true,
            'condensed'=>true,
            'responsive'=>true,
            'hover'=>true,
            //'showPageSummary'=>true,
            'panel'=> [
                'heading' => 'รายชื่อบุคลากร', 
                'type'=>GridView::TYPE_PRIMARY,
            ],
            'persistResize'=>false,
            'export' => false,            
    ]); ?>
    <?php Pjax::end(); ?>
</div>


<?php
$script = <<< JS

        function selectRegis(key,showname,showregno,age,allergic) {     
                       $.confirm({
                                title:                  'ยืนยันการเลือกข้อมูล' ,                 
                                content:                false ,
                                confirmButtonClass:     'btn-info' ,
                                cancelButtonClass:      'btn-danger' ,
                                confirm: function(){                                                
                                       window.parent.$.select_register_n_close_modal(key,showname,showregno,age,allergic) ;                                                                     
                                }
                        })                            
                        
        }
                     
JS;
$this->registerJs($script) ;
?>