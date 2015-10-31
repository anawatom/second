<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
/* @var $this yii\web\View */
/* @var $model app\models\ClnMedicineTest */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'cln-medicine-test-form']); ?>    
<div class="cln-medicine-test-form">
        <div class="box box-primary">
            <div class="box-header with-border">          
                <h3 class="box-title"> การรักษา </h3>                       
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                                <?=$form->field($model, 'TRAN_INJ_GEN_NO')->hiddenInput()->label(false)?>
                                <?= $form->field($model, 'CURE_GEN_NO')
                                         ->widget(Select2::classname(), [   'data' => $cureItems,
                                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                                            'pluginOptions' => [
                                                                                'allowClear' => true
                                                                            ],
                                                                        ]); 
                                ?>
                            
                                <?= $form->field($model, 'EXPENSES')
                                         ->widget(MaskMoney::classname(),   [   'pluginOptions' => [    'prefix' => '฿ ',
                                                                                                        'suffix' => '',
                                                                                                        'allowZero' => true,
                                                                                                        'allowNegative' => false
                                                                                                    ]
                                                                            ]);
                                ?>

                            
                            
                             <?= $form->field($model, 'UNIT_POINT')->dropDownList( $seqNumItems,           // Flat array ('id'=>'label')
                                                                                  ['prompt'=>'']    // options
                                 ); ?>
        
        
        
                            <?= $form->field($model, 'DISCOUNT')->textInput() ?>
                            <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>    
        <div class="form-group" style="text-align: center;">
                <?= Html::button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update') , ['class'=> $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'save-cln-medicine-test-button']) ; ?>            
        </div>
  
</div>

  <?php ActiveForm::end(); ?>

<?php
$script = <<< JS

        PNotify.prototype.options.styling = "bootstrap3";
        PNotify.prototype.options.delay = 2000;
        
        function calTotal() {
            var discount    = Number(jQuery('[name="ClnMedicineTest[DISCOUNT]"]').val()) ;
            var expense     = Number(jQuery('[name="ClnMedicineTest[EXPENSES]"]').val()) ;
            var unitpoint   = Number(jQuery('[name="ClnMedicineTest[UNIT_POINT]"]').val()) ;
            if (isNaN(discount) || isNaN(expense) || isNaN(unitpoint) ) {           
                return ;
            }
            var total = parseFloat( ((100 - discount) * expense / 100) * unitpoint  ).toFixed(2) ;
            jQuery('[name="ClnMedicineTest[TOTAL]"]').val(total) ; 
        }        
        $('#clnmedicinetest-cure_gen_no').on('change', function(){
            var dataPost = { 'CURE_GEN_NO': jQuery('[name="ClnMedicineTest[CURE_GEN_NO]"]').val() } ;               
            $.post('index.php?r=clncure/get-cure-expense', dataPost , function(html) {}).success(function(data) {
                        var data = $.parseJSON(data) ;                    
                        jQuery('[name="ClnMedicineTest[EXPENSES]"]').val(data.CURE_EXPENSES) ; 
                        jQuery('[name="clnmedicinetest-expenses-disp"]').val(data.CURE_EXPENSES) ; 
                        jQuery('[name="clnmedicinetest-expenses-disp"]').focus() ;
                        jQuery('[name="ClnMedicineTest[UNIT_POINT]"]').val('1') ; 
                        jQuery('[name="ClnMedicineTest[DISCOUNT]"]').val('0') ; 
                        calTotal() ;           
            }, 'json'); 
        }); 
        $('#clnmedicinetest-discount').on('change', function(){
             calTotal() ;       
        });

        $('#clnmedicinetest-expenses-disp').on('change', function(){
             calTotal() ;       
        });

        $('#clnmedicinetest-unit_point').on('change', function(){
             calTotal() ;       
        });                
        $('#save-cln-medicine-test-button').click(function(){
                $.confirm({
                        title:                  'ยืนยันการบันทึกข้อมูล' ,                 
                        content:                false ,
                        confirmButtonClass:     'btn-info' ,
                        cancelButtonClass:      'btn-danger' ,
                        confirm: function(){                                    
                                $.blockUI({ message: '<img src="images/LoaderIcon.gif" style="padding-right:14px" /> Just a moment...' });                                                                                     
                                $.post($('#cln-medicine-test-form').attr('action'), $('#cln-medicine-test-form').serialize() , function(html) {})
                                    .success(function(data) {  
                                            var data = JSON.parse(data);     
                                            if(data.result == 'success') {                                                                                                                                    
                                                    $(document).ajaxStop($.unblockUI);          
                                                    window.parent.$.close_cln_medicine_test_modal() ;    
                                            } else {
                                                    $(document).ajaxStop($.unblockUI);
                                                    new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                            }       
                                    })
                                    .fail(function(xhr, textStatus, errorThrown) {
                                            alert(xhr.responseText);
                                            $(document).ajaxStop($.unblockUI);
                                            new PNotify({text:'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ', type:'danger'});
                                    });                                                                             
                        }
                })                     
        });         
        
JS;
$this->registerJs($script) ;
?>