<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;

 
/* @var $this yii\web\View */
/* @var $model app\models\ClnRegister */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border">          
            <h3 class="box-title"> ssss </h3>                       
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                           <?= $form->field($model, 'TITLE_GEN_NO')->widget(Select2::classname(), [
                                    'data' => $titleItems,
                                    'options' => ['placeholder' => 'Select a state ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'SNAME')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'TYPE_CARD')->widget(Select2::classname(), [
                                    'data' => $cardItems,
                                    'options' => ['placeholder' => 'Select a state ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>       
                            <?= $form->field($model, 'ID_CARD')->textInput(['maxlength' => true]) ?>    
                            <div class="row">
                                    <div class="col-xs-6">
                                            <?= $form->field($model, 'SEX')->radioList(array('M'=>'ชาย','F'=>'หญิง')); ?>
                                    </div>
                                    <div class="col-xs-6">
                                            <?= $form->field($model, 'AGE')->textInput(['maxlength' => true]) ?>
                                    </div>
                            </div>
                            <?= $form->field($model, 'TEL')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'OCCUPATION')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <?= $form->field($model, 'ADDRESS')->textArea(['rows' => '3']) ?>
                            <?= $form->field($model, 'PLACE_OCCUPATION')->textArea(['rows' => '3']) ?>
                            <?= $form->field($model, 'TEL_OCCUPATION')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'ALLERGIC')->textArea(['rows' => '3']) ?>
                            <div class="row">
                                    <div class="col-xs-6">
                                            <?= $form->field($model, 'SHOW_REG_NO')->textInput(['readonly'=>true,'style'=>'height:100px;border-color:blue;text-align:center;color:blue;font:30px bold;']) ?>
                                                                     
    					<?php 

						echo Html::button('<span class="glyphicon glyphicon-floppy-disk"></span> สร้างเลขที่ระเบียน', 
						 					['id' => 'TESTBUTTON',
							 					'class' => 'btn btn-success']);
					?>
                                    </div>
                            </div>

                    </div>
                </div>    
            </div>
        </div>
        <div class="box-footer" style="display: block">
             dslkfasdjfdaslkf
        </div>
    </div>

    
<div class="cln-register-form">



    <?php 
    /*$form->field($model, 'REGISTER_GEN_NO')->textInput() 
     *$form->field($model, 'REG_CODE')->textInput()
     *$form->field($model, 'REG_YEAR')->textInput() 
     */ 
    ?>
    


    
   
    
    
    



    
    
    

    



    



    
 

    


    <?= $form->field($model, 'SHOW_REG_NO')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'SHOW_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VERSION')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
		<?php 

						echo Html::button('<span class="glyphicon glyphicon-floppy-disk"></span> Upload', 
						 					['id' => 'TESTBUTTON',
							 					'class' => 'btn btn-success']);
					?>
    
    
    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
        
    $('#TESTBUTTON').click(function() {            
            var dataPost ;        
            $.post('index.php?r=clnregister/get-next-reg-no', dataPost , function(html) {}).success(function(data) {
                    var data = $.parseJSON(data) ;
                    jQuery('[name="ClnRegister[SHOW_REG_NO]"]').val(data.SHOW_REG_NO)
        }, 'json');
    }); 
        
JS;
$this->registerJs($script) ;
?>