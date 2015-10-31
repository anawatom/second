<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;

//use kartik\helpers\Html;
use kartik\widgets\Select2;
use kartik\grid\GridView;

use kartik\popover\PopoverX;
use yii\helpers\Url;
use yii\bootstrap\Modal;

use kartik\datecontrol\DateControl;
use kartik\widgets\TimePicker ;
use kartik\widgets\Spinner ;
use app\models\ClnSport;
use app\models\ClnCauseInj;
use app\models\ClnBoundaryInj;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\bootstrap\Nav;

?>

<?php $form = ActiveForm::begin(['id' => 'cln-tran-inj-test-form-update']); ?>
<div class="cln-tran-inj-form">

    
    <div class="box box-primary">
        <div class="box-header with-border">          
            <div class="col-md-6">
                    <h3 class="box-title"> เวชระเบียนผู้ป่วย   </h3> 
            </div>
            <div class="col-md-6" style="text-align: right"><?=Html::a (   '<i class="glyphicon glyphicon-plus"></i>',
                                                                            null , 
                                                                            [   'class' => 'btn btn-success modal-cln-select-register-button',
                                                                                'title' => Yii::t('yii', 'View'),
                                                                                'data-value' => 'index.php?r=clnregister/selectregister',                     
                                                                            ]
                                                                        ) ?> </div>
        </div>
        <div class="box-body">  
            <div class="row">   
                <div class="col-md-3">
                    <?= $form->field($clnRegisterModel, 'SHOW_REG_NO')->textInput(['maxlength' => true ,'disabled' => true]) ?>                                                               
                </div>    
                <div class="col-md-9">
                    <?= $form->field($clnRegisterModel, 'SHOW_NAME')->textInput(['maxlength' => true ,'disabled' => true]) ?>                         
                </div>                                  
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($clnRegisterModel, 'AGE')->textInput(['maxlength' => true ,'disabled' => true]) ?>                         
                </div>    
                <div class="col-md-9">
                    <?= $form->field($clnRegisterModel, 'ALLERGIC')->textInput(['maxlength' => true ,'disabled' => true]) ?>                         
                </div>                                  
            </div>            
        </div> 
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">          
            <h3 class="box-title"> <?= $model->title ;?> </h3>                       
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'TRAN_INJ_GEN_NO')->hiddenInput()->label(false) ?>     
                    <?= $form->field($model, 'REGISTER_GEN_NO')->hiddenInput()->label(false) ?>     
                    
                    <?= $form->field($model, 'DIAGNOSE_TYPE')->radioList(['1'=>'กีฬา','2'=>'ทั่วไป'],['separator' => '<span style="padding: 0 40px">&nbsp;</span>', 'tabindex' => 3]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            
                            <?= $form->field($model, 'SPORT_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => ArrayHelper::map(ClnSport::find()->all(),'SPORT_GEN_NO','SPORT_NAME') ,
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>
                            <?= $form->field($model, 'CAUSE_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => ArrayHelper::map(ClnCauseInj::find()->all(),'CAUSE_GEN_NO','CAUSE_NAME'),
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>   

                            <?= $form->field($model, 'BOND_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => ArrayHelper::map(ClnBoundaryInj::find()->all(),'BOND_GEN_NO','BOND_NAME'),
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>                                                                                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <?= $form->field($model, 'CAUSE_OTHER')->textInput(['maxlength' => true]) ?>                            
                            <?= $form->field($model, 'DIAGNOSE')->textInput(['maxlength' => true]) ?>                            
                            <?= $form->field($model, 'DOCTOR_NAME')->textInput(['maxlength' => true]) ?>     
                    </div>            
                </div>
            </div>
        </div>
    </div> 
</div>


        <div class="form-group" style="text-align: center;">
                <?= $form->field($model, 'REGISTER_GEN_NO')->hiddenInput()->label(false) ?>
                <?= Html::button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update') , ['class'=> $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'save-cln-tran-inf-test-button']) ; ?>            
        </div>

<?php ActiveForm::end(); ?> 

        <div class="box box-primary">
                <div class="box-header with-border">          
                    <h3 class="box-title"> ลงเวลา </h3>                       
                </div>
                <div class="box-body">
                        <div class="row" >                                                                                  
                                <div class="col-md-2" style="min-width: 220px;padding-bottom: 20px; "> 
                                        <a class="btn btn-primary btn-regis-time" style="width: 100% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;" ><span class="badge" style="margin-right:1em;">1</span>ลงทะเบียน</a>	
                                        <?=TimePicker::widget(['model' => $model, 'attribute' => 'REGIS_TIME', 'pluginOptions' => [ 'minuteStep' => 1 , 'defaultTime' => false ]]); ?>
                                </div>
                                <div class="col-md-2" style="min-width: 220px;padding-bottom: 20px; "> 
                                        <a class="btn btn-info btn-wait-tran-time" style="width: 100% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;"><span class="badge" style="margin-right:1em;">2</span>รอการรักษา</a>	 
                                        <?=TimePicker::widget(['model' => $model, 'attribute' => 'WAIT_TRAN_TIME', 'pluginOptions' => [ 'minuteStep' => 1 , 'defaultTime' => false ]]); //$form->field($model, 'WAIT_TRAN_TIME')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_TIME])->label(false);?>
                                </div>
                                <div class="col-md-2" style="min-width: 220px;padding-bottom: 20px; "> 
                                        <a class="btn btn-success btn-tran-time" style="width: 100% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;"><span class="badge" style="margin-right:1em;">3</span>รับการรักษา</a>	 
                                        <?=TimePicker::widget(['model' => $model, 'attribute' => 'TRAN_TIME', 'pluginOptions' => [ 'minuteStep' => 1 , 'defaultTime' => false ]]);//$form->field($model, 'TRAN_TIME')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_TIME])->label(false);?>
                                </div>                           
                                <div class="col-md-2" style="min-width: 220px;padding-bottom: 20px; ">
                                        <a class="btn btn-danger btn-recv-medic-time" style="width: 100% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;"><span class="badge" style="margin-right:1em;">4</span>รับยา</a>	 
                                        <?=TimePicker::widget(['model' => $model, 'attribute' => 'RECV_MEDIC_TIME', 'pluginOptions' => [ 'minuteStep' => 1 , 'defaultTime' => false ]]);//$form->field($model, 'RECV_MEDIC_TIME')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_TIME])->label(false);?>
                                </div>
                                <div class="col-md-2" style="min-width: 220px;padding-bottom: 20px; ">
                                        <a class="btn btn-warning btn-paid-time" style="width: 100% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;"><span class="badge" style="margin-right:1em;">5</span>ชำระเงิน</a>	 
                                        <?=TimePicker::widget(['model' => $model, 'attribute' => 'PAID_TIME', 'pluginOptions' => [ 'minuteStep' => 1 , 'defaultTime' => false ]]);//$form->field($model, 'PAID_TIME')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_TIME])->label(false);?>                                                                
                                </div>

                        </div>               
                </div>                
        </div>    

        <?php $form = ActiveForm::begin(['id' => 'cln-tran-inj-test-form-update-4']); ?>
        <div class="row">
                <div class="col-md-12">   
                <?php //Pjax::begin(['formSelector' => 'x1form', 'id' => 'cln-tran-inj-resp-grid', 'timeout' => false, 'enablePushState' => false]) ?>
                <?= GridView::widget([
                        'id' => 'tttttttttt' ,
                        'dataProvider' => $dataClnTranInjRespProvider,
                        'columns' => [
                                     [   'attribute'=>'clnStaff.STAFF_TYPE', 
                                         'vAlign'=>'middle', 
                                         'value'=>function ($model, $key, $index, $widget) { 
                                                         $staff_type_desc = ['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล'] ;
                                                         return $staff_type_desc[$model->clnStaff->STAFF_TYPE] ;
                                                  },
                                        // 'label' => 'dkdkdkd' ,
                                     ] ,                             
                                     [   'attribute'=>'STAFF_ID',
                                         'value' => 'clnStaff.FIRST_NAME' ,   
                                       //  'label' => 'dkdkdkd' ,
                                     ] ,                                                                    
                                     [       'class' => 'kartik\grid\ActionColumn',
                                             'template' => ' {delete}',
                                             'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
                                             'contentOptions' => ['class' => 'padding-left-5px'],
                                             'buttons' =>    [      'delete' => function ($url, $model, $key) {
                                                                                     return Html::a  (   '<span class="glyphicon glyphicon-trash"></span>',
                                                                                                         null , 
                                                                                                         [   'class' => 'delete-cln-tran-inj-resp-button',
                                                                                                             'title' => Yii::t('yii', 'Delete'),
                                                                                                             'data-value' => 'index.php?r=clntraninjresp/delete&id='.$key,                    
                                                                                                         ]
                                                                                                     );           
                                                                             },                
                                                             ],
                                     ] ,                            
                        ],
                        'toolbar'=> [
                                [       'content'=> Html::a (   '<i class="glyphicon glyphicon-plus"></i>',
                                                                null , 
                                                                [   'class' => 'btn btn-success modal-cln-tran-inj-resp-button',
                                                                    'title' => Yii::t('yii', 'View'),
                                                                    'data-value' => 'index.php?r=clntraninjresp/create&tran_inj_gen_no='.$model->TRAN_INJ_GEN_NO,                    
                                                                ]
                                                            )
                                                    . ' ' .                       
                                                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])          
                                ] ,                                          
                                '{export}',
                                '{toggleData}',
                        ] , 
                        'pjax' => true ,
                        'pjaxSettings' => [ 'neverTimeout'=>true ,
                                            'options'=> [ 'id'=>'cln-tran-inj-resp-grid',
                                                        ]
                        ],                                                                                                   
                        'export'=>['fontAwesome'=>true] ,
                        'bordered'=>true,
                        'striped'=>true,
                        'condensed'=>true,
                        'responsive'=>true,
                        'hover'=>true,
                        'showPageSummary'=>true,
                        'panel'=> [
                                'heading' => 'ผู้รักษา', 
                                'type'=>GridView::TYPE_PRIMARY,
                        ],
                        'persistResize'=>false,
                        'export' => false,                                                                                                                                                                          
                ]); ?>       
                <?php //Pjax::end() ?>    
                </div>
        </div>    
        <?php ActiveForm::end(); ?> 

            
        <?php $form = ActiveForm::begin(['id' => 'cln-tran-inj-test-form-update-2']); ?>   
        <div class="row">
                <?php 
                        $v_arrayData['TRAN_INJ_GEN_NO'] = $model->TRAN_INJ_GEN_NO ;
                        $v_urlparams = base64_encode(serialize($v_arrayData));                                                          
                ?>    
                <div class="col-md-12">                        
                <?php Pjax::begin(['formSelector' => 'x2form', 'id' => 'cln-medicine-test-grid', 'timeout' => false, 'enablePushState' => false]) ?>         
                <?= GridView::widget([
                         'id' => 'tttttttttt2' ,
                        'dataProvider' => $dataClnMedicineTestProvider,
                        //'filterModel' => $searchClnMedicineTestSearchModel,
                        'columns' => [            
                                    [   'attribute' => 'CURE_GEN_NO' ,
                                        'value' => 'clncure.CURE_NAME' ,
                                    ] ,
                                    [   'attribute' => 'EXPENSES' ,
                                        'format' => ['decimal', 2],
                                        'hAlign'=>'right', 
                                        'vAlign'=>'middle',                                                    
                                    ] ,
                                    [   'attribute' => 'UNIT_POINT' , 
                                        'hAlign'=>'right', 
                                        'vAlign'=>'middle', 
                                    ] ,
                                    [
                                        'attribute' => 'DISCOUNT' ,
                                        'pageSummary'=>'Total',
                                        'hAlign'=>'right', 
                                        'vAlign'=>'middle', 
                                    ] ,    
                                    [
                                        'attribute' => 'TOTAL' ,
                                        'format' => ['decimal', 2],
                                        'hAlign'=>'right', 
                                        'vAlign'=>'middle',
                                        'pageSummary'=>true
                                    ] ,                     
                                     [       'class' => 'kartik\grid\ActionColumn',
                                             'template' => ' {delete}',
                                             'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
                                             'contentOptions' => ['class' => 'padding-left-5px'],
                                             'buttons' =>    [      'delete' => function ($url, $model, $key) {
                                                                                     return Html::a  (   '<span class="glyphicon glyphicon-trash"></span>',
                                                                                                         null, 
                                                                                                         [   'class' => 'delete-cln-medicine-test-button',
                                                                                                             'title' => Yii::t('yii', 'Delete'),
                                                                                                             'data-value' => 'index.php?r=clnmedicinetest/delete&id='.$key,                    
                                                                                                         ]
                                                                                                     );           
                                                                             },                
                                                             ],
                                     ] ,   

                            ],

//                                   'pjax' => true ,
//                                    'pjaxSettings' => [ 'neverTimeout'=>true ,
//                                                        'options'=> [ 'id'=>'cln-medicine-test-grid',
//                                                                    ]
//                                    ],  
                        'toolbar'=> [
                                [       'content'=> Html::a (   '<i class="glyphicon glyphicon-plus"></i>',
                                                                null, 
                                                                [   'class' => 'btn btn-success modal-cln-medicine-test-button',
                                                                    'title' => Yii::t('yii', 'View'),
                                                                    'data-value' => 'index.php?r=clnmedicinetest/create&params='.$v_urlparams ,                    
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
                            'heading' => 'การรักษา', 
                            'type'=>GridView::TYPE_PRIMARY,
                            //  'heading'=>true ,
                        ],
                        'persistResize'=>false,
                        'export' => false,                                                       
                ]); ?> 
                <?php Pjax::end() ?>                                    
                </div>
        </div>    
        <?php ActiveForm::end(); ?> 


    





<?php
        Modal::begin([
                        'id' => 'modal-cln-tran-inj-resp' ,
                        'size' => 'modal-lg' ,
                    ]);
        echo "<div id = 'modal-cln-tran-inj-resp-content'></div>";
        Modal::end() ;
        
        Modal::begin([
                        'id' => 'modal-cln-medicine-test' ,
                        'size' => 'modal-sm' ,
                    ]);
        echo "<div id = 'modal-cln-medicine-test-content'></div>";
        Modal::end() ;        
        
        Modal::begin([
                        'id' => 'modal-cln-select-register' ,
                        'size' => 'modal-lg' ,
                    ]);
        echo "<div id = 'modal-cln-select-register-content'></div>";
        Modal::end() ;                
        
$script = <<< JS
        
        PNotify.prototype.options.styling = "bootstrap3";
        PNotify.prototype.options.delay = 2000;                   
        
        $('#save-cln-tran-inf-test-button').click(function(){
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){       
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });  
                                $.post($('#cln-tran-inj-test-form-update').attr('action'), $('#cln-tran-inj-test-form-update').serialize() , function(html) {})
                                    .success(function(data) {  
                                            var data = JSON.parse(data);       
                                            if(data.result == 'success') {                                                       
                                                    $(document).ajaxStop($.unblockUI); 
                                                    new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                            } else {
                                                    $(document).ajaxStop($.unblockUI);
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            }       
                                    }) ;
                                  /*  .fail(function(xhr, textStatus, errorThrown) {
                                            alert(xhr.responseText);
                                            $(document).ajaxStop($.unblockUI);
                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                    }); */                                                                            
                        }
                })                     
        }); 
        

        $('.btn-regis-time').click(function() {            
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                  
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                 
                                        var dataPost = { 'TRAN_INJ_GEN_NO': jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() };                                
                                        $.post('index.php?r=clntraninjtest/set_current_regis_time', dataPost , function(html) {})
                                            .success(function(data) { 
                                                    var data = JSON.parse(data);                                                                  
                                                    if(data.result == 'success') {        
                                                            jQuery('[name="ClnTranInjTest[REGIS_TIME]"]').val(data.set_current_time) ;
                                                            new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    } else {
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }
                                            })
                                            .fail(function() {
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });       
                                $(document).ajaxStop($.unblockUI); 
                        }
                })       
        }) ;
        
        $('.btn-wait-tran-time').click(function() {     
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                  
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                 
                                        var dataPost = { 'TRAN_INJ_GEN_NO': jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() };                                   
                                        $.post('index.php?r=clntraninjtest/set_current_wait_tran_time', dataPost , function(html) {})
                                            .success(function(data) { 
                                                    var data = JSON.parse(data);                                                                  
                                                    if(data.result == 'success') {        
                                                            jQuery('[name="ClnTranInjTest[WAIT_TRAN_TIME]"]').val(data.set_current_time) ;
                                                            new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    } else {
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }
                                            })
                                            .fail(function() {
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });       
                                $(document).ajaxStop($.unblockUI); 
                        }
                })         
        }) ;
        
        $('.btn-tran-time').click(function() {                                 
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                  
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                 
                                        var dataPost = { 'TRAN_INJ_GEN_NO': jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() };                                   
                                        $.post('index.php?r=clntraninjtest/set_current_tran_time', dataPost , function(html) {})
                                            .success(function(data) { 
                                                    var data = JSON.parse(data);                                                                  
                                                    if(data.result == 'success') {        
                                                            jQuery('[name="ClnTranInjTest[TRAN_TIME]"]').val(data.set_current_time) ;
                                                            new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    } else {
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }
                                            })
                                            .fail(function() {
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });       
                                $(document).ajaxStop($.unblockUI); 
                        }
                })               
        }) ;
        $('.btn-recv-medic-time').click(function() {                         
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                  
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                 
                                        var dataPost = { 'TRAN_INJ_GEN_NO': jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() };                                   
                                        $.post('index.php?r=clntraninjtest/set_current_recv_medic_time', dataPost , function(html) {})
                                            .success(function(data) { 
                                                    var data = JSON.parse(data);                                                                  
                                                    if(data.result == 'success') {        
                                                            jQuery('[name="ClnTranInjTest[RECV_MEDIC_TIME]"]').val(data.set_current_time) ;
                                                            new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    } else {
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }
                                            })
                                            .fail(function() {
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });       
                                $(document).ajaxStop($.unblockUI); 
                        }
                })           
        }) ;
        $('.btn-paid-time').click(function() {                                 
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                  
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                 
                                        var dataPost = { 'TRAN_INJ_GEN_NO': jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() };                                   
                                        $.post('index.php?r=clntraninjtest/set_current_paid_time', dataPost , function(html) {})
                                            .success(function(data) { 
                                                    var data = JSON.parse(data);                                                                  
                                                    if(data.result == 'success') {        
                                                            jQuery('[name="ClnTranInjTest[PAID_TIME]"]').val(data.set_current_time) ;
                                                            new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                    } else {
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }
                                            })
                                            .fail(function() {
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });       
                                $(document).ajaxStop($.unblockUI); 
                        }
                })          
        }) ;   
            

        function prepare_jq_cln_select_register_form () {
                $('.modal-cln-select-register-button').click(function(){
                        var data_value = $(this).attr("data-value") ;
                        $('#modal-cln-select-register').modal('show')
                            .find('#modal-cln-select-register-content')
                            .load(data_value);
                });                                        
                $.select_register_n_close_modal = function(key,showname,showregno,age,allergic){
                        jQuery('[name="ClnRegister[SHOW_REG_NO]"]').val(showregno) ;
                        jQuery('[name="ClnRegister[SHOW_NAME]"]').val(showname) ;
                        jQuery('[name="ClnRegister[AGE]"]').val(age) ;
                        jQuery('[name="ClnRegister[ALLERGIC]"]').val(allergic) ;
                        jQuery('[name="ClnTranInjTest[REGISTER_GEN_NO]"]').val(key) ;        
                        $('#modal-cln-select-register').modal('hide') ;
                } ; 
        }

        function prepare_jq_cln_medicine_test_form () {
                $.close_cln_medicine_test_modal = function(){
                        $('#modal-cln-medicine-test').modal('hide') ;
                        $.pjax.reload({container:'#cln-medicine-test-grid'});        
                };                
                $('.modal-cln-medicine-test-button').click(function(){
                        var data_value = $(this).attr("data-value") ;
                        $('#modal-cln-medicine-test').modal('show')
                            .find('#modal-cln-medicine-test-content')
                            .load(data_value);
                }); 
                $('.delete-cln-medicine-test-button').click(function(){
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
                                                            $.pjax.reload({container:'#cln-medicine-test-grid'}); 
                                                    } else {
                                                            $(document).ajaxStop($.unblockUI);
                                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                                    }       
                                            })
                                            .fail(function() {
                                                   alert('dkdld') ;
                                                    $(document).ajaxStop($.unblockUI);
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            });                                                                             
                                }
                        })                    
                });         
        }
        
        function prepare_jq_cln_tran_inj_resp_form () {
                $.close_modal = function(){
                        $('#modal-project-type').modal('hide') ;
                        $.pjax.reload({container:'#cln-tran-inj-grid'});        
                };
                $('.modal-cln-tran-inj-resp-button').click(function(){
                        var data_value = $(this).attr("data-value") ;
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
                                                            $.pjax.reload({container:'#cln-tran-inj-resp-grid'});       
                                                           
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
                $.create_staff_resp_n_close_modal = function(data_value){
                        $.confirm({
                                title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                                content:                false ,
                                confirmButtonClass:     'btn-info' ,
                                cancelButtonClass:      'btn-danger' ,
                                confirm: function(){          
                                        $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });  
                                        var clntraninjtestform = $('#cln-tran-inj-test-form-update') ;
                                        var dataPost =  {   'STAFF_ID': data_value ,
                                                            'TRAN_INJ_GEN_NO':  jQuery('[name="ClnTranInjTest[TRAN_INJ_GEN_NO]"]').val() ,                               
                                        };
                                        
                                          
                                        $.post('index.php?r=clntraninjresp/create',dataPost, function(html){})      
                                                .success(function(data) {   
                                                        var data = JSON.parse(data);       
                                                        if(data.result == 'success') {                                                                                                                                    
                                                                $(document).ajaxStop($.unblockUI); 
                                                                new PNotify({text:'บันทึกข้อมูลสำเร็จ', type:'info'});
                                                                $.pjax.reload({container:'#cln-tran-inj-resp-grid'});  
                                                                $('#modal-cln-tran-inj-resp').modal('hide') ;
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
                        $.pjax.reload({container:'#cln-tran-inj-grid'});     
                };                          
        } ;    
            
        prepare_jq_cln_tran_inj_resp_form () ;
        prepare_jq_cln_medicine_test_form () ;
        prepare_jq_cln_select_register_form () ;
        
        $("#cln-tran-inj-resp-grid").on("pjax:success", function() {
            prepare_jq_cln_tran_inj_resp_form() ;          
        });
        $("#cln-medicine-test-grid").on("pjax:success", function() {
            prepare_jq_cln_medicine_test_form() ;          
        });                      
        
JS;
$this->registerJs($script) ;
?>
</div>
