<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use \kartik\grid\EditableColumn ;
use \kartik\datecontrol\DateControl;
use \kartik\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClnCauseInjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cln Cause Injs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cln-cause-inj-index">
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    //'class' => 'yii\grid\SerialColumn'],
                    //'CAUSE_GEN_NO',
                    'CAUSE_CODE',
                    'CAUSE_NAME',
                    'CAUSE_TYPE',
                    //'CREATE_BY',
                    // 'CREATE_DATE',
                    // 'UPDATE_BY',
                    // 'UPDATE_DATE',
                    // 'VERSION',
                    [
                        'class'=>'kartik\grid\ActionColumn',
                        //'dropdown'=>$this->dropdown,
                        'dropdownOptions'=>['class'=>'pull-right'],            
                        'urlCreator'=>function($action, $model, $key, $index) {  return 'index.php?r=clncauseinj/'.$action.'&id='.$key; },
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
                        'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) . ' ' .
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
            'showPageSummary'=>true,
            'panel'=> [
                'heading' => 'สาเหตุการบาดเจ็บ', 
                'type'=>GridView::TYPE_PRIMARY,
                //  'heading'=>true ,
            ],
            'persistResize'=>false,
            'export' => false,                                             
    ]); ?>
    
</div>