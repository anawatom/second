<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\grid\DataColumn;
use app\models\ClnTitle ;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnStaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Staff');
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="cln-select-staff-index">
    <?php Pjax::begin([ 'id'=>'pjax-select-staff-index', 'enablePushState' => false]); ?>
    <?=GridView::widget([      
            'id' => 'dkdkdkdkdk' ,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                        [
                            'attribute'=>'TITLE_GEN_NO', 
                            'vAlign'=>'middle', 
                            'value'=>'clnTitle.TITLE_NAME',
                            'filterType'=>GridView::FILTER_SELECT2,
                            'filter'=>ArrayHelper::map(ClnTitle::find()->orderBy('TITLE_NAME')->asArray()->all(), 'TITLE_GEN_NO', 'TITLE_NAME'), 
                            'filterWidgetOptions'=>[
                                'pluginOptions'=>['allowClear'=>true,
                                                'width'=>'100%'],
                            ],
                            'filterInputOptions'=>['placeholder'=>''],
                        ] ,                     
                        [   'attribute'=>'FIRST_NAME',
                            'value'=>function ($model, $key, $index, $widget) {
                                            return Html::a( $model->FIRST_NAME, 'javascript:selectStaffResp('.$key.')') ;
                                    },
                            'format'=>'raw',        
                        ], 
                        'LAST_NAME',
                        [
                            'attribute'=>'GENDER', 
                            'vAlign'=>'middle', 
                            'value'=>function ($model, $key, $index, $widget) { 
                                            $gender_desc = ['M'=>'ชาย','F'=>'หญิง'] ;
                                            return $gender_desc[$model->GENDER] ;
                                     },
                            'filterType'=>GridView::FILTER_SELECT2,
                            'filter'=>(['M'=>'ชาย','F'=>'หญิง']), 
                            'filterWidgetOptions'=>[
                                'pluginOptions'=>['allowClear'=>true,
                                                'width'=>'100%'],
                            ],
                            'filterInputOptions'=>['placeholder'=>''],
                        ] ,                
                        [
                            'attribute'=>'STAFF_TYPE', 
                            'vAlign'=>'middle', 
                            'value'=>function ($model, $key, $index, $widget) { 
                                            $staff_type_desc = ['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล'] ;
                                            return $staff_type_desc[$model->STAFF_TYPE] ;
                                     },
                            'filterType'=>GridView::FILTER_SELECT2,
                            'filter'=>(['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล']), 
                            'filterWidgetOptions'=>[
                                'pluginOptions'=>['allowClear'=>true,
                                                'width'=>'100%'],
                            ],
                            'filterInputOptions'=>['placeholder'=>''],
                        ] ,                                    
            ],
            'containerOptions'=> [
                    'style'=>'overflow: auto'
            ], 
            'headerRowOptions'=> [
                    'class'=>'kartik-sheet-style'
            ],
//            'pjax'=>true,
//            'pjaxSettings'=> [ 'options' => [   'id'=>'pjax-select-staff-index',
//                                                'enablePushState' => false,
//                                            ]
//            ],
            'export'=>['fontAwesome'=>true] ,
            'bordered'=>true,
            'striped'=>true,
            'condensed'=>true,
            'responsive'=>true,
            'hover'=>true,
            'showPageSummary'=>true,
            'panel'=> [
                'heading' => 'รายชื่อบุคลากร', 
                'type'=>GridView::TYPE_PRIMARY,
            ],
            'persistResize'=>false,
            'export' => false,                                                       
    ]);  ?>
<?php Pjax::end(); ?>
</div>


<?php

$script = <<< JS

        function selectStaffResp(data_value) {                
                window.parent.$.create_staff_resp_n_close_modal(data_value) ;    
        }
                     
JS;
$this->registerJs($script) ;
?>