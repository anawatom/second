<?php

namespace app\controllers;

use Yii;
use app\models\ClnTranInjTest;
use app\models\ClnTranInjTestSearch;
use app\models\ClnDiagnose;
use app\models\ClnSport;
use app\models\ClnCauseInj;
use app\models\ClnBoundaryInj;
use app\models\ClnCure;
use app\models\ClnCureSearch;
use app\models\ClnRegister;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use \DateTime;
/**
 * ClnTranInjTestController implements the CRUD actions for ClnTranInjTest model.
 */
class ClntraninjtestController extends Controller
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

    /**
     * Lists all ClnTranInjTest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnTranInjTestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClnTranInjTest model.
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
     * Creates a new ClnTranInjTest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClnTranInjTest();
        $clnRegisterModel = new ClnRegister() ;
        
        if ( $model->load(Yii::$app->request->post()) ) {         
                $model->TRAN_INJ_GEN_NO = ClnTranInjTest::getNewID(); //new \yii\db\Expression('CLN_TRAN_INJ_SEQ.nextval') ;
                $model->TRAN_INJ_DATE = new \yii\db\Expression('SYSDATE');
                $model->CREATE_BY = 'admin' ;
                $model->CREATE_DATE = new \yii\db\Expression('SYSDATE');
                $model->UPDATE_BY = 'admin' ;
                $model->UPDATE_DATE = new \yii\db\Expression('SYSDATE');
                if ($model->save()) {
                        return $this->redirect(['update', 'id' => $model->TRAN_INJ_GEN_NO]);
                }   else {
                        $data['result'] = print_r($model->getErrors(),1) ;
                        header('Content-type: application/json');
                        echo json_encode($data);    
                }               
        } else {
            return $this->render('create', [
                'model' => $model ,
                'clnRegisterModel' => $clnRegisterModel ,
            ]);
        }
    }

    /**
     * Updates an existing ClnTranInjTest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$modelClnDiagnose = ClnDiagnose::findOne(['TRAN_INJ_GEN_NO' => $id]);
        //$sportItems = ArrayHelper::map(ClnSport::find()->all(),'SPORT_GEN_NO','SPORT_NAME') ;        
        //$causeItems = ArrayHelper::map(ClnCauseInj::find()->all(),'CAUSE_GEN_NO','CAUSE_NAME') ;
        //$bondItems = ArrayHelper::map(ClnBoundaryInj::find()->all(),'BOND_GEN_NO','BOND_NAME') ;
       
        $clnRegisterModel = ClnRegister::findOne(['REGISTER_GEN_NO'=>$model->REGISTER_GEN_NO]) ;
        
        
        $searchClnMedicineTestSearchModel = new \app\models\ClnMedicineTestSearch() ;  
        $queryParams = array();
        $queryParams = Yii::$app->request->queryParams ;
        $queryParams['ClnMedicineTestSearch']['TRAN_INJ_GEN_NO'] = $id ;
        $dataClnMedicineTestProvider = $searchClnMedicineTestSearchModel->search($queryParams) ; //Yii::$app->request->queryParams); 
        
        $searchClnTranInjRespSearchModel = new \app\models\ClnTranInjRespSearch() ;  
        $queryParams = array();
        $queryParams = Yii::$app->request->queryParams ;
        $queryParams['ClnTranInjRespSearch']['TRAN_INJ_GEN_NO'] = $id ;
        $dataClnTranInjRespProvider = $searchClnTranInjRespSearchModel->search($queryParams) ; //Yii::$app->request->queryParams);         

        
        
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'id' => $model->TRAN_INJ_GEN_NO]);
        
        if ($model->load(Yii::$app->request->post()) ) {
            
                
                if ($model->save()) {
                        $data['result'] = 'success' ;            
                        
                        $data['result_desc'] = print_r(Yii::$app->request->post(),1) ;
                        
                } else {
                        $data['result'] = 'error' ;
                }
                header('Content-type: application/json');
                echo json_encode($data);                            
        } else {
            return $this->render('update', [
                'model' => $model ,
                'clnRegisterModel' => $clnRegisterModel ,
                //'modelClnDiagnose' => $modelClnDiagnose ,
                //'sportItems' => $sportItems ,
                //'causeItems' => $causeItems ,
                //'bondItems' => $bondItems ,
                'searchClnMedicineTestSearchModel' => $searchClnMedicineTestSearchModel,
                'dataClnMedicineTestProvider' => $dataClnMedicineTestProvider,
                'searchClnTranInjRespSearchModel' => $searchClnTranInjRespSearchModel,
                'dataClnTranInjRespProvider' => $dataClnTranInjRespProvider,
            ]);
        }
    }

    /**
     * Deletes an existing ClnTranInjTest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClnTranInjTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnTranInjTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnTranInjTest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
                        
    public function actionSet_current_regis_time() {         
         if (Yii::$app->request->isAjax) {                
                date_default_timezone_set("Asia/Bangkok");                
                $set_current_time = date('h:i A', strtotime(date('m/d/Y h:i:s a', time())));                
                $command = Yii::$app->db->createCommand("UPDATE CLN_TRAN_INJ_TEST T1 SET T1.REGIS_TIME = '".$set_current_time."' WHERE T1.TRAN_INJ_GEN_NO = ".$_POST['TRAN_INJ_GEN_NO']);
                $num_row_effect = $command->execute();
                $result['set_current_time'] = $set_current_time ;                
                if ($num_row_effect == 1) {
                        $result['result'] = 'success' ; 
                } else {
                        $result['result'] = 'error' ; 
                }
                header('Content-type: application/json');
                echo json_encode($result);
        }
    }
    
    public function actionSet_current_wait_tran_time() {         
         if (Yii::$app->request->isAjax) {
                date_default_timezone_set("Asia/Bangkok");
                $set_current_time = date('h:i A', strtotime(date('m/d/Y h:i:s a', time())));                               
                $command = Yii::$app->db->createCommand("UPDATE CLN_TRAN_INJ_TEST T1 SET T1.WAIT_TRAN_TIME = '".$set_current_time."' WHERE T1.TRAN_INJ_GEN_NO = ".$_POST['TRAN_INJ_GEN_NO']);                
                $num_row_effect = $command->execute();
                $result['set_current_time'] = $set_current_time ;                
                if ($num_row_effect == 1) {
                        $result['result'] = 'success' ; 
                } else {
                        $result['result'] = 'error' ; 
                }
                header('Content-type: application/json');
                echo json_encode($result);
        }
    }
    
    public function actionSet_current_tran_time() {         
         if (Yii::$app->request->isAjax) {
                date_default_timezone_set("Asia/Bangkok");
                $set_current_time = date('h:i A', strtotime(date('m/d/Y h:i:s a', time())));                              
                $command = Yii::$app->db->createCommand("UPDATE CLN_TRAN_INJ_TEST T1 SET T1.TRAN_TIME = '".$set_current_time."' WHERE T1.TRAN_INJ_GEN_NO = ".$_POST['TRAN_INJ_GEN_NO']);
                $num_row_effect = $command->execute();
                $result['set_current_time'] = $set_current_time ;                
                if ($num_row_effect == 1) {
                        $result['result'] = 'success' ; 
                } else {
                        $result['result'] = 'error' ; 
                }
                header('Content-type: application/json');
                echo json_encode($result);
        }
    }
    
    public function actionSet_current_recv_medic_time() {         
         if (Yii::$app->request->isAjax) {
                date_default_timezone_set("Asia/Bangkok");
                $set_current_time = date('h:i A', strtotime(date('m/d/Y h:i:s a', time())));                                     
                $command = Yii::$app->db->createCommand("UPDATE CLN_TRAN_INJ_TEST T1 SET T1.RECV_MEDIC_TIME = '".$set_current_time."' WHERE T1.TRAN_INJ_GEN_NO = ".$_POST['TRAN_INJ_GEN_NO']);
                $num_row_effect = $command->execute();
                $result['set_current_time'] = $set_current_time ;                
                if ($num_row_effect == 1) {
                        $result['result'] = 'success' ; 
                } else {
                        $result['result'] = 'error' ; 
                }
                header('Content-type: application/json');
                echo json_encode($result);
        }
    }    

    public function actionSet_current_paid_time() {         
         if (Yii::$app->request->isAjax) {
                date_default_timezone_set("Asia/Bangkok");
                $set_current_time = date('h:i A', strtotime(date('m/d/Y h:i:s a', time())));                                  
                $command = Yii::$app->db->createCommand("UPDATE CLN_TRAN_INJ_TEST T1 SET T1.PAID_TIME = '".$set_current_time."' WHERE T1.TRAN_INJ_GEN_NO = ".$_POST['TRAN_INJ_GEN_NO']);
                $num_row_effect = $command->execute();
                $result['set_current_time'] = $set_current_time ;                
                if ($num_row_effect == 1) {
                        $result['result'] = 'success' ; 
                } else {
                        $result['result'] = 'error' ; 
                }
                header('Content-type: application/json');
                echo json_encode($result);
        }
    }

}
