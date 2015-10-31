<?php

namespace app\controllers;

use Yii;
use app\models\ClnTranInjResp;
use app\models\ClnTranInjRespSearch;
use app\models\ClnStaffSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClnTranInjResController implements the CRUD actions for ClnTranInjResp model.
 */
class ClntraninjrespController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
                ],
            ],
        ];
    }

    
    
    public function actionSelectStaff() 
    {
        $searchModel = new ClnStaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('selectstaff', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all ClnTranInjResp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnTranInjRespSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClnTranInjResp model.
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
     * Creates a new ClnTranInjResp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $user_id = 'admin' ;
        $model = new ClnTranInjResp();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) { 
    
        if (Yii::$app->request->post()) { 
                $model->TRAN_INJ_RESP_ID = ClnTranInjResp::getNewID();
                $model->TRAN_INJ_GEN_NO = $_POST['TRAN_INJ_GEN_NO'];
                $model->STAFF_ID = $_POST['STAFF_ID'];
                $model->CREATE_BY = $user_id;
                $model->CREATE_DATE = new \yii\db\Expression('SYSDATE');                                
                if ($model->save()) {
                        $data['result'] = 'success' ;                                                
                } else {
                        $data['result'] = 'error' ;
                }
                header('Content-type: application/json');
                echo json_encode($data);     
        } else {
                $searchModel = new ClnStaffSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);                
                return $this->renderAjax('selectstaff', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);          
        }

        
        /* $model = new ClnTranInjResp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TRAN_INJ_RESP_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        } */
    }

    /**
     * Updates an existing ClnTranInjResp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TRAN_INJ_RESP_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClnTranInjResp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if( $this->findModel($id)->delete() ) {
                $data['result'] = 'success' ;                                                           
        } else {
                $data['result'] = 'error' ;                                                           
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }

    /**
     * Finds the ClnTranInjResp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnTranInjResp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnTranInjResp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
