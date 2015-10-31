<?php

namespace app\controllers;

use Yii;
use app\models\ClnRegister;
use app\models\ClnRegisterSearch;
use app\models\ClnTitle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsonParser;

/**
 * ClnRegisterController implements the CRUD actions for ClnRegister model.
 */
class ClnregisterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    
    /**
     * Get next Reg No
     * [NuttaV][20150720]
     */
    public function actionGetNextRegNo(){
            //if (Yii::app()->request->isAjaxRequest) {
            //    header('Content-type: application/json');
                $result['SHOW_REG_NO'] = 'ddddddd' ;               
                echo Json::encode($result) ;
    }
    
    /**
     * Lists all ClnRegister models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnRegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $titleItems = ArrayHelper::map(ClnTitle::find()->all(),'TITLE_GEN_NO','TITLE_NAME') ;
        $cardItems = Yii::$app->utilsHelper->getCardTypeLov();

        return $this->render('index', [
            'searchModel' => $searchModel ,
            'dataProvider' => $dataProvider ,
            'titleItems' => $titleItems ,
            'cardItems' => $cardItems ,
        ]);
    }

    /**
     * Displays a single ClnRegister model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClnRegister model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClnRegister();
        $titleItems=ArrayHelper::map(ClnTitle::find()->all(),'TITLE_GEN_NO','TITLE_NAME') ;       
        $cardItems = Yii::$app->utilsHelper->getCardTypeLov();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->REGISTER_GEN_NO]);
        } else {                             
            return $this->render('create',  [   'model' => $model ,
                                                'titleItems' => $titleItems ,
                                                'cardItems' => $cardItems ,
                                            ]);
        }
    }

    /**
     * Updates an existing ClnRegister model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->REGISTER_GEN_NO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClnRegister model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    public function actionSelectregister()
    {  
        $searchModel = new ClnRegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $titleItems = ArrayHelper::map(ClnTitle::find()->all(),'TITLE_GEN_NO','TITLE_NAME') ;
        $cardItems = Yii::$app->utilsHelper->getCardTypeLov();

        return $this->renderAjax('selectregis', [
            'searchModel' => $searchModel ,
            'dataProvider' => $dataProvider ,
            'titleItems' => $titleItems ,
            'cardItems' => $cardItems ,
        ]);
    }    
    /**
     * Finds the ClnRegister model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnRegister the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnRegister::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
