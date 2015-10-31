<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\grid\EditableColumn ;
use kartik\datecontrol\DateControl;
use kartik\grid\DataColumn;
use app\models\ClnTitle ;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnStaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Staff');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="cln-staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create Cln Staff'), Url::to('index.php?r=clnstaff/create'), ['class' => 'btn btn-success','id'=>'modalClnStaffButton']) ?>
        <?='';// Html::button('Create Branch', ['value'=>Url::to('index.php?r=clnstaff/create'),'class'=>'btn btn-success','id'=>'modalClnStaffButton']) ; ?>
    </p>
<?php Pjax::begin();?>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
                        //'STAFF_ID',

                        [
                            'attribute'=>'TITLE_GEN_NO', 
                            'vAlign'=>'middle', 
                            'value'=>'clnTitle.TITLE_NAME',
                            'filterType'=>GridView::FILTER_SELECT2,
                            'filter'=>ArrayHelper::map(ClnTitle::find()->orderBy('TITLE_NAME')->asArray()->all(), 'TITLE_GEN_NO', 'TITLE_NAME'), 
                            'filterWidgetOptions'=>[
                                'pluginOptions'=>['allowClear'=>true],
                            ],
                            'filterInputOptions'=>['placeholder'=>''],
                        ] ,                                          
                        'FIRST_NAME',
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
                                'pluginOptions'=>['allowClear'=>true],
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
                                'pluginOptions'=>['allowClear'=>true],
                            ],
                            'filterInputOptions'=>['placeholder'=>''],
                        ] ,                 
                        // 'BIRTH_DATE',
                        // 'STAFF_TYPE',
                        // 'CREATE_BY',
                        // 'CREATE_DATE',
                        // 'LAST_UPD_BY',
                        // 'LAST_UPD_DATE',

                        //['class' => 'yii\grid\ActionColumn'],
                                             

                                       
                      /*  [
                            'class'=>'kartik\grid\ActionColumn',
                            //'dropdown'=>$this->dropdown,
                            'dropdownOptions'=>['class'=>'pull-right'],         
                            'urlCreator'=>function($action, $model, $key, $index) {  return 'index.php?r=clnstaff/'.$action.'&id='.$key; },
                            'viewOptions'=>['title'=>'This will launch the sport details page.', 'data-toggle'=>'tooltip'],   
                            'updateOptions'=>['title'=>'This will launch the sport update page.', 'data-toggle'=>'tooltip' , 'id'=>'modalClnStaffButton2' , 'value'=>'alkjdaklfjadkjfdskl'],
                            'deleteOptions'=>['title'=>'This will launch the sport delete action.', 'data-toggle'=>'tooltip'],
                            'headerOptions'=>['class'=>'kartik-sheet-style'],
                        ] , */
                                             
                                             [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{update} {delete}',
        'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
        'contentOptions' => ['class' => 'padding-left-5px'],

        'buttons' => [
            'update' => function ($url, $model, $key) {
                                        return Html::a  (   '<span class="glyphicon glyphicon-eye-open"></span>',
                                                            '#', 
                                                            [   'class' => 'activity-view-link',
                                                                'title' => Yii::t('yii', 'View'),
                                                                'data-value' => 'index.php?r=clnstaff/update&id='.$key,                    
                                                            ]
                                                        );           
                         },
            ],],
                    
                    
                  
            
            
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
                        'content'=> Html::a (  '<i class="glyphicon glyphicon-plus"></i>',
                                                '#', 
                                                [   'class' => 'btn btn-success activity-view-link',
                                                    'title' => Yii::t('yii', 'View'),
                                                    'data-value' => 'index.php?r=clnstaff/create',                    
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
                'heading' => 'รายชื่อบุคลากร', 
                'type'=>GridView::TYPE_PRIMARY,
                //  'heading'=>true ,
            ],
            'persistResize'=>false,
            'export' => false,                                                       
    ]); ?>
<?php Pjax::end(); ?>
</div>

<?php
        Modal::begin([
                        'id' => 'modal-cln-staff' ,
                        'size' => 'modal-lg' ,
                    ]);
        echo "<div id = 'modal-cln-staff-content'></div>";
        Modal::end() ;
?>           

<?php Modal::begin([
    'id' => 'activity-modal',
    'header' => '<h4 class="modal-title">View Image</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',

]); ?>

<div class="well">


</div>


<?php Modal::end(); ?>



<?php
$script = <<< JS
    
     
    $.close_modal = function(){
            $('#modal-cln-staff').modal('hide') ;
            location.reload() ;
    };
    $('#modalClnStaffButton').click(function(){
                $('#modal-cln-staff').modal('show')
                .find('#modal-cln-staff-content')
                .load($(this).attr('value'));
    }); 
        
    $('.activity-view-link').click(function() {
        var data_value = $(this).attr("data-value") ;
        $('#modal-cln-staff').modal('show')
                .find('#modal-cln-staff-content')
                .load(data_value);
    });
     
                
JS;
$this->registerJs($script) ;
?>

