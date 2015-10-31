<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\ClnStaff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cln-staff-form">

         <?php $form = ActiveForm::begin(['id' => 'form-cln-staff']); ?>  
        <div class="box box-primary">
                
                <div class="box-body">
                        <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                                <?= $form->field($model, 'TITLE_GEN_NO')
                                                         ->widget(Select2::classname(), [   'data' => $titleItems,
                                                                                            'options' => ['placeholder' => 'Select a title ...'],
                                                                                            'pluginOptions' => [
                                                                                                'allowClear' => true
                                                                                            ],
                                                                                        ]); 
                                                ?>    
                                                <?= $form->field($model, 'FIRST_NAME')->textInput(['maxlength' => true]) ?>
                                                <?= $form->field($model, 'LAST_NAME')->textInput(['maxlength' => true]) ?>                                             
                                                <?= $form->field($model, 'GENDER')->radioList(['M' => 'ชาย', 'F' => 'หญิง'],array('separator'=>'&nbsp;&nbsp;&nbsp')) ?>
                                                <?= $form->field($model, 'STAFF_TYPE')
                                                         ->widget(Select2::classname(), [   'data' => $staffTypeItems,
                                                                                            'options' => ['placeholder' => 'Select a staff type ...'],
                                                                                            'pluginOptions' => [
                                                                                                'allowClear' => true
                                                                                            ],
                                                                                        ]); 
                                                ?>       
                                        </div>
                                </div>
                        </div>
                </div>
        </div> <!-- <div class="box box-primary"> -->
        <div class="form-group" style="text-align: center;">
        <?php  // Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update') , ['class'=> $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'save-cln-staff-button']) ; ?>            
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
            
        $('#save-cln-staff-button').click(function(){
                $.ajax( {   type:       'POST',
                            url:        $('#form-cln-staff').attr('action') ,
                            data:       $('#form-cln-staff').serialize() ,
                            success:    function( data ) {
                                                bootbox.alert('บันทึกข้อมูลสำเร็จ', function() {
                                                        window.parent.$.close_modal() ;     
                                                });
                                        },
                            error:      function (xhr, textStatus, error){
                                        },
                        }
                );                            
        }); 
                             
JS;
$this->registerJs($script) ;
?>