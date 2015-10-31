<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
//use kartik\helpers\Html;
use kartik\widgets\Select2;
use kartik\grid\GridView;

use kartik\popover\PopoverX;
use yii\helpers\Url;
use yii\bootstrap\Modal;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\ClnTranInj */
/* @var $form yii\widgets\ActiveForm */

use yii\bootstrap\Nav;
?>

<div class="cln-tran-inj-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TRAN_INJ_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'REGISTER_GEN_NO')->textInput() ?>

    <?= $form->field($model, 'TRAN_INJ_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VERSION')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    
    
    <div class="box box-primary">
        <div class="box-header with-border">          
            <h3 class="box-title"> <?= $modelClnDiagnose->title ;?> </h3>                       
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            <?= $form->field($modelClnDiagnose, 'DIAGNOSE_TYPE')->radioList(['1'=>'กีฬา','2'=>'ทั่วไป'],['separator' => '<span style="padding: 0 40px">&nbsp;</span>', 'tabindex' => 3]); ?>
                            <?= $form->field($modelClnDiagnose, 'SPORT_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => $sportItems,
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>
                            <?= $form->field($modelClnDiagnose, 'CAUSE_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => $causeItems,
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>   

                            <?= $form->field($modelClnDiagnose, 'BOND_GEN_NO')->widget(Select2::classname(), [
                                                            'data' => $bondItems,
                                                            'options' => ['placeholder' => 'Select a state ...'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]); ?>                                                                                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <?= $form->field($modelClnDiagnose, 'CAUSE_OTHER')->textInput(['maxlength' => true]) ?>                            
                            <?= $form->field($modelClnDiagnose, 'DIAGNOSE')->textInput(['maxlength' => true]) ?>                            
                            <?= $form->field($modelClnDiagnose, 'DOCTOR_NAME')->textInput(['maxlength' => true]) ?>     
                    </div>            
                </div>
            </div>
        </div>
    </div>    
     <?php ActiveForm::end(); ?> 
    <div class="box box-primary">
        <div class="box-header with-border">          
            <h3 class="box-title"> <?= $modelClnDiagnose->title ;?> </h3>                       
        </div>
        <div class="box-body">
            <div class="row">
                <?php ;
                    $v_arrayData['TRAN_INJ_GEN_NO'] = $model->TRAN_INJ_GEN_NO ;
                    $v_urlparams = base64_encode(serialize($v_arrayData)); 
                    echo Html::button('Create Branch', ['value'=>Url::to('index.php?r=clnmedicinetest/create&params='.$v_urlparams),'class'=>'btn btn-success','id'=>'modalButton']) ;                
                    Modal::begin([
                        'id' => 'modal' ,
                        'size' => 'modal-sm' ,
                    ]);
                    echo "<div id = 'modalContent'></div>";
                    Modal::end() ;
                ?>    
                <div class="col-md-12">    
                    
                    <?php 
                    $dataClnMedicineTestProvider->pagination->pageParam = 'user-page';
                $dataClnMedicineTestProvider->sort->sortParam = 'user-sort';
                
                    ?>
         
        <?= GridView::widget([
        'dataProvider' => $dataClnMedicineTestProvider,
        //'filterModel' => $searchClnMedicineTestSearchModel,
           
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'MEDICINE_GEN_NO',
            //'TRAN_INJ_GEN_NO',

            //'CURE_GEN_NO' ,
            [
                'attribute' => 'CURE_GEN_NO' ,
                'value' => 'clncure.CURE_NAME' ,
            ] ,
            [
                'attribute' => 'EXPENSES' ,
                'format' => ['decimal', 2],
            ] ,
            'UNIT_POINT' ,
            'DISCOUNT' ,
            [
                'attribute' => 'TOTAL' ,
                'format' => ['decimal', 2],
            ] ,                     
            // 'CREATE_DATE',
            // 'UPDATE_BY',
            // 'UPDATE_DATE',
            // 'VERSION',

            //['class' => 'yii\grid\ActionColumn'],
                    [
                        'class'=>'kartik\grid\ActionColumn',
                        //'dropdown'=>$this->dropdown,
                        'dropdownOptions'=>['class'=>'pull-right'],            
                      //  'urlCreator'=>function($action, $model, $key, $index) {  return 'index.php?r=clnboundaryinj/'.$action.'&id='.$key; },
                        'viewOptions'=>['title'=>'This will launch the boundary inj details page.', 'data-toggle'=>'tooltip'],   
                        'updateOptions'=>['title'=>'This will launch the boundary inj update page.', 'data-toggle'=>'tooltip'],
                        'deleteOptions'=>['title'=>'This will launch the boundary inj delete action.', 'data-toggle'=>'tooltip'],
                        'headerOptions'=>['class'=>'kartik-sheet-style'],
                    ] ,
                    [
                        'class'=>'kartik\grid\CheckboxColumn',
                        'headerOptions'=>['class'=>'kartik-sheet-style'],
                    ],                        
        ],
          'containerOptions'=> [
                    'style'=>'overflow: auto'
            ], 
            'headerRowOptions'=> [
                    'class'=>'kartik-sheet-style'
            ],
                                
            'filterRowOptions'=> [
               
                    'class'=>'kartik-sheet-style'
            ],
            'pjax'=>true,
            'toolbar'=> [
                    [
                        /*echo Html::button('Create Branch', ['value'=>Url::to('index.php?r=clnmedicinetest/create&params='.$v_urlparams),'class'=>'btn btn-success','id'=>'modalButton']) ;                */
                        'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['creates'], ['class' => 'btn btn-success']) . ' ' .
                        //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Sport', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
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
           // 'showPageSummary'=>true,
            'panel'=> [
                'heading' => 'บริเวณที่บาดเจ็บ', 
                'type'=>GridView::TYPE_PRIMARY,
                //  'heading'=>true ,
            ],
            'persistResize'=>false,
            'export' => false,                                                       
    ]); ?> 
                    </div>
            </div>
        </div>
    </div>    
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    
<div class="box box-primary">
            <div class="box-header with-border">          
                <h3 class="box-title"> การรักษา </h3>                       
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       
                            <div class="col-md-1"> </div>
                            
                            <div class="col-md-2"> <a class="btn btn-primary" style="width: 80% ; padding-bottom: 20px; padding-top: 20px; font-size: 18px;" href="/sidenav-demo/profile/primary#demo"><span class="badge" style="margin-right:1em;">1</span>ลงทะเบียน</a>	 </div>
                            <div class="col-md-2"> <a class="btn btn-info" style="width: 80% ; padding-bottom: 20px; padding-top: 20px;" href="/sidenav-demo/profile/primary#demo"><span class="badge" style="margin-right:1em;">2</span>รอการรักษา</a>	 </div>
                            <div class="col-md-2"> <a class="btn btn-success" style="width: 80% ; padding-bottom: 20px; padding-top: 20px;" href="/sidenav-demo/profile/primary#demo"><span class="badge" style="margin-right:1em;">3</span>รับการรักษา</a>	 </div>
                           
                            <div class="col-md-2"><a><span class="badge">4</span> รับยา</a> </div>
                            <div class="col-md-2"><a><span class="badge">5</span> ชำระเงิน</a> </div>
                            <div class="col-md-1"> </div>
                       
                    </div>
                </div>
            </div>
                
</div>    
    
  <div class="col-sm-12">
		<div class="well">
			<legend>Select Panel Type</legend>
			<a class="btn btn-default" href="/sidenav-demo/profile/default#demo">Default</a>			
                        <a class="btn btn-primary" href="/sidenav-demo/profile/primary#demo">Primary</a>			
                        <a class="btn btn-info" href="/sidenav-demo/profile/info#demo">Info</a>			
                        <a class="btn btn-success" href="/sidenav-demo/profile/success#demo">Success</a>			
                        <a class="btn btn-danger" href="/sidenav-demo/profile/danger#demo">Danger</a>			
                        <a class="btn btn-warning" href="/sidenav-demo/profile/warning#demo">Warning</a>		</div>
	</div>
    <?php
    
   /*$form = ActiveForm::begin(['fieldConfig'=>['showLabels'=>true]]);
$model->CREATE_BY = null;
PopoverX::begin([
    'placement' => PopoverX::ALIGN_TOP,
    'toggleButton' => ['label'=>'Login', 'class'=>'btn btn-default'],
    'header' => '<i class="glyphicon glyphicon-lock"></i> Enter credentials',
    'footer'=>Html::submitButton('Submit', ['class'=>'btn btn-sm btn-primary']) .
             Html::resetButton('Reset', ['class'=>'btn btn-sm btn-default'])
]);
echo $form->field($model, 'CREATE_DATE')->textInput(['placeholder'=>'Enter user...']);
echo $form->field($model, 'CREATE_BY')->passwordInput(['placeholder'=>'Enter password...']);
echo $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ;
PopoverX::end();
ActiveForm::end();  */
    
    ?>

<?php
$script = <<< JS
    
    $(document).ready(function() {
  	$('#rootwizard').bootstrapWizard();
});
        
JS;
$this->registerJs($script) ;
?>
</div>
