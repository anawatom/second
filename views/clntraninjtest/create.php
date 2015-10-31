<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInjTest */

$this->title = Yii::t('app', 'Create Cln Tran Inj Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cln Tran Inj Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'cln-tran-inj-test-form']); ?>
<div class="cln-tran-inj-test-create">
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

        <div class="form-group" style="text-align: center;">
                <?= $form->field($model, 'REGISTER_GEN_NO')->hiddenInput()->label(false) ?>
                <?= Html::button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update') , ['class'=> $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'save-cln-tran-inf-test-button']) ; ?>            
        </div>
</div>
<?php ActiveForm::end(); ?> 

<?php
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
                                $.post($('#cln-tran-inj-test-form').attr('action'), $('#cln-tran-inj-test-form').serialize() , function(html) {})
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
        prepare_jq_cln_select_register_form () ;
        
        
JS;
$this->registerJs($script) ;
?>       