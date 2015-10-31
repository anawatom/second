<?php

namespace app\controllers;

use Yii;
use app\models\ClnMedicineTest;
use app\models\ClnMedicineTestSearch;
use \app\models\ClnCure;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use yii\helpers\Json;
use yii\web\JsonParser;
/**
 * ClnMedicineTestController implements the CRUD actions for ClnMedicineTest model.
 */
class ClnmedicinetestController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ClnMedicineTest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnMedicineTestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClnMedicineTest model.
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
     * Creates a new ClnMedicineTest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user_id = 'admin' ;
        $model = new ClnMedicineTest();

        if ($model->load(Yii::$app->request->post())) {
                $model->MEDICINE_GEN_NO = ClnMedicineTest::getNewID();
                $model->CREATE_BY = $user_id;
                $model->CREATE_DATE = new \yii\db\Expression('SYSDATE');
                $model->UPDATE_BY = $user_id;
                $model->UPDATE_DATE = new \yii\db\Expression('SYSDATE');

                if ($model->save()) {
                        $data['result'] = 'success' ;                                                
                } else {
                        $data['result'] = 'error' ;
                }
                header('Content-type: application/json');
                echo json_encode($data);                           
        } else {
  
                $getData = unserialize(base64_decode(Yii::$app->request->get('params'))) ;        
                $cureItems = ArrayHelper::map(ClnCure::find()->all(),'CURE_GEN_NO','CURE_NAME') ;        
                $model->TRAN_INJ_GEN_NO = $getData['TRAN_INJ_GEN_NO'];      

                $seqNumItems = Yii::$app->utilsHelper->getSeqNum10();


                return $this->renderAjax('create',  [   'model' => $model,
                                                        'cureItems' => $cureItems,
                                                        'seqNumItems' => $seqNumItems,
                                                    ]);
            
        }
    }

    /**
     * Updates an existing ClnMedicineTest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
/*    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MEDICINE_GEN_NO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    } */

    /**
     * Deletes an existing ClnMedicineTest model.
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
     * Finds the ClnMedicineTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnMedicineTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnMedicineTest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionGetCureExpense()
    {
       $result['SHOW_REG_NO'] = 'ddddddd' ;               
       echo Json::encode($result) ;
    }
}
