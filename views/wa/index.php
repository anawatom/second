<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use kartik\editable\Editable ;
use \kartik\grid\EditableColumn ;
use \kartik\datecontrol\DateControl;
use \kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WA_ZONE_SEARCH */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wa  Zones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wa--zone-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wa  Zone', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
    
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns' => [
            

            'ZONE_CODE',
           
        [
         'class'=>'kartik\grid\EditableColumn', 
    'attribute'=> 'ZONE_NAME_TH',
    'readonly'=>function($model, $key, $index, $widget) {
      //  return (!$model->status); // do not allow editing of inactive records
    },
    'editableOptions'=>[
        'header'=>'Buy Amount', 
        'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
        'options'=>[
            'pluginOptions'=>['min'=>0, 'max'=>5000]
        ]
    ],],
            'ZONE_NAME_EN',
            'CREATE_USER_ID',
           [ 
           'class' => '\kartik\grid\DataColumn',
            'attribute'=> 'CREATE_TIME',
                //'language' => 'th' ,
                'value' => function ($model, $index, $widget) {
              Yii::$app->formatter->locale = 'th';
                return   Yii::$app->formatter->asDate($model->CREATE_TIME,'long');
            },
            
//  'formatter' => [
//
//    'dateFormat' => 'php:d-M-Y',
//    'datetimeFormat' => 'php:d-M-Y H:i:s',
//    'timeFormat' => 'php:H:i:s',
//] ,              
                 'filterType'=>GridView::FILTER_DATE,
         
          'filterWidgetOptions' => [
               'language' => 'th' ,
'pluginOptions'=>[
    'language' => 'th' ,
'format' => 'dd MM yyyy',
    'displayFormat' => 'php:d-F-Y',
'autoWidget' => true,
'autoclose' => true,
'todayBtn' => true,

],'options' => ['placeholder' => 'Select operating time ...'],
],     
            ] ,
        [
    'class'=>'kartik\grid\ActionColumn',
    //'dropdown'=>$this->dropdown,
    'dropdownOptions'=>['class'=>'pull-right'],
            
    'urlCreator'=>function($action, $model, $key, $index) {  return 'index.php?r=wa/'.$action.'&id='.$key; },
    'viewOptions'=>['title'=>'This will launch the book details page. Disabled for this demo!', 'data-toggle'=>'tooltip'],
   // 'urlCreator'=>function($action, $model, $key, $index) { return 'dddddddd'; },
    'updateOptions'=>['title'=>'This will launch the book update page. Disabled for this demo!', 'data-toggle'=>'tooltip'],
   //          'urlCreator'=>function($action, $model, $key, $index) { return '555555555555555'; },
    'deleteOptions'=>['title'=>'This will launch the book delete action. Disabled for this demo!', 'data-toggle'=>'tooltip'],
    'headerOptions'=>['class'=>'kartik-sheet-style'],
],
[
    'class'=>'kartik\grid\CheckboxColumn',
    'headerOptions'=>['class'=>'kartik-sheet-style'],
],
            // 'LAST_UPD_USER_ID',
            // 'LAST_UPD_TIME',

           

        ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'Header Before 1', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                //['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
            ],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    // set your toolbar
    'toolbar'=> [
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
            //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            //Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
        ],
        '{export}',
        '{toggleData}',
    ] , 
    // set export properties
    'export'=>[
        'fontAwesome'=>true
    ],
    // parameters from the demo form
    'bordered'=>true,//$bordered,
    'striped'=>true, //$striped,
    'condensed'=>true, //$condensed,
    'responsive'=>true, //$responsive,
    'hover'=>true, //$hover,
    'showPageSummary'=>true, //$pageSummary,
    'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
        'heading'=>true , //$heading,
    ],
    'persistResize'=>false,
    'export' => false,
    //'exportConfig'=>$exportConfig,
]);     
            
            
      /*      GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns'
                 'export' => false,
    ]);  */ ?>

</div>

