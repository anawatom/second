<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnTranInjRespSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Tran Inj Resps');
$this->params['breadcrumbs'][] = $this->title;

?> 

<div class="cln-tran-inj-resp-index">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                            'TRAN_INJ_RESP_ID',
                            'STAFF_ID',
                            [   'attribute'=>'clnStaff.STAFF_TYPE', 
                                'vAlign'=>'middle', 
                                'value'=>function ($model, $key, $index, $widget) { 
                                                $staff_type_desc = ['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล'] ;
                                                return $staff_type_desc[$model->STAFF_TYPE] ;
                                         },
                                'filterType'=>GridView::FILTER_SELECT2,
                                'filter'=>(['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล']), 
                                'filterWidgetOptions'=>[
                                    'pluginOptions'=>['allowClear'=>true],
                                ],
                                'filterInputOptions'=>['placeholder'=>''],
                            ] ,                             
                            [   'attribute'=>'STAFF_ID',
                                'value' => 'clnStaff.FIRST_NAME' ,
                                'filterType'=>GridView::FILTER_SELECT2,
                                'filter'=>ArrayHelper::map(\app\models\ClnStaff::find()->all(),'STAFF_ID','FIRST_NAME') ,
                                'filterWidgetOptions'=>[
                                    'pluginOptions'=>[  'allowClear'=>true ,
                                                        'width'=>'100%'],                            
                                ],
                                'filterInputOptions'=>['placeholder'=>'']                
                            ] ,                    
                            'CREATE_BY',
                            'CREATE_DATE',
                            'TRAN_INJ_GEN_NO',
                            [       'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{update} {delete}',
                                    'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
                                    'contentOptions' => ['class' => 'padding-left-5px'],
                                    'buttons' =>    [      'update' => function ($url, $model, $key) {
                                                                            return Html::a  (   '<span class="glyphicon glyphicon-pencil"></span>',
                                                                                                '#', 
                                                                                                [   'class' => 'modal-cln-tran-inj-resp-button',
                                                                                                    'title' => Yii::t('yii', 'Update'),
                                                                                                    'data-value' => 'index.php?r=clntraninjresp/update&id='.$key,                    
                                                                                                ]
                                                                                            );           
                                                                    },
                                                            'delete' => function ($url, $model, $key) {
                                                                            return Html::a  (   '<span class="glyphicon glyphicon-trash"></span>',
                                                                                                '#', 
                                                                                                [   'class' => 'delete-cln-tran-inj-resp-button',
                                                                                                    'title' => Yii::t('yii', 'Delete'),
                                                                                                    'data-value' => 'index.php?r=clntraninjresp/delete&id='.$key,                    
                                                                                                ]
                                                                                            );           
                                                                    },                
                                                    ],
                            ] ,                    
                            [
                                    'class'=>'kartik\grid\CheckboxColumn',
                                    'headerOptions'=>['class'=>'kartik-sheet-style'],
                            ] ,          
            ],
            'toolbar'=> [
                    [       'content'=> Html::a (   '<i class="glyphicon glyphicon-plus"></i>',
                                                    '#', 
                                                    [   'class' => 'btn btn-success modal-cln-tran-inj-resp-button',
                                                        'title' => Yii::t('yii', 'View'),
                                                        'data-value' => 'index.php?r=clntraninjresp/create&tran_inj_gen_no=8',                    
                                                    ]
                                                )
                                        . ' ' .                       
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])          
                    ] ,                                          
                    '{export}',
                    '{toggleData}',
            ] , 
            'export'=>['fontAwesome'=>true] ,
            'bordered'=>true,
            'striped'=>true,
            'condensed'=>true,
            'responsive'=>true,
            'hover'=>true,
            'showPageSummary'=>true,
            'panel'=> [
                    'heading' => 'รายการประเภทโครงการ', 
                    'type'=>GridView::TYPE_PRIMARY,
            ],
            'persistResize'=>false,
            'export' => false,                                                                                    
            ]); ?>

</div>

<?php

        Modal::begin([
                        'id' => 'modal-cln-tran-inj-resp' ,
                        'size' => 'modal-lg' ,
                    ]);
        echo "<div id = 'modal-cln-tran-inj-resp-content'></div>";
        Modal::end() ;

$script = <<< JS

        PNotify.prototype.options.styling = "bootstrap3";
        PNotify.prototype.options.delay = 2000;
        
        $.create_staff_resp_n_close_modal = function(data_value){
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){          
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });            
                                
                                $.get(data_value, function(){})
                                    .success(function(data) {   
                                            var data = JSON.parse(data);                                                      
                                            if(data.result == 'success') {                                                                                                                                    
                                                    $(document).ajaxStop($.unblockUI); 
                                                    new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    window.parent.$.close_modal() ;    
                                            } else {
                                                    $(document).ajaxStop($.unblockUI);
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            }       
                                    })
                                    .fail(function() {                                           
                                            $(document).ajaxStop($.unblockUI);
                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                    });                                                                             
                        }
                }) 
        
        
                $('#modal-cln-tran-inj-resp').modal('hide') ;
                //location.reload() ;
        }; 
        $('.modal-cln-tran-inj-resp-button').click(function(){
                var data_value = $(this).attr("data-value") ;
                alert(data_value) ;
                $('#modal-cln-tran-inj-resp').modal('show')
                    .find('#modal-cln-tran-inj-resp-content')
                    .load(data_value);
        }); 
        $('.delete-cln-tran-inj-resp-button').click(function(){
                var data_value = $(this).attr("data-value") ;       
                $.confirm({
                        title:                  'ยืนยันการลบข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){          
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                         
                                $.get(data_value, function(){})
                                    .success(function(data) {   
                                            var data = JSON.parse(data);                                                      
                                            if(data.result == 'success') {                                                                                                                                    
                                                    $(document).ajaxStop($.unblockUI); 
                                                    new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    location.reload() ;
                                            } else {
                                                    $(document).ajaxStop($.unblockUI);
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            }       
                                    })
                                    .fail(function() {                                          
                                            $(document).ajaxStop($.unblockUI);
                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                    });                                                                             
                        }
                })                    
        });         
                 
   
        
JS;
$this->registerJs($script) ;
?>