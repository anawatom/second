<?php

namespace app\controllers;

use Yii;
use app\models\ClnTranInj;
use app\models\ClnTranInjSearch;
use app\models\ClnDiagnose;
use app\models\ClnSport;
use app\models\ClnCauseInj;
use app\models\ClnBoundaryInj;
use app\models\ClnCure;
use app\models\ClnCureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


use \app\models\ClnMedicineTest;

/**
 * ClnTranInjController implements the CRUD actions for ClnTranInj model.
 */
class ClntraninjController extends Controller
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
     * Lists all ClnTranInj models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnTranInjSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelClnDiagnose = new ClnDiagnose();

        $seqNumItems = Yii::$app->utilsHelper->getSeqNum10();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'seqNumItems' => $seqNumItems,
        ]);
    }

    /**
     * Displays a single ClnTranInj model.
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
     * Creates a new ClnTranInj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClnTranInj();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TRAN_INJ_GEN_NO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ClnTranInj model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelClnDiagnose = ClnDiagnose::findOne(['TRAN_INJ_GEN_NO' => $id]);
        $sportItems = ArrayHelper::map(ClnSport::find()->all(),'SPORT_GEN_NO','SPORT_NAME') ;        
        $causeItems = ArrayHelper::map(ClnCauseInj::find()->all(),'CAUSE_GEN_NO','CAUSE_NAME') ;
        $bondItems = ArrayHelper::map(ClnBoundaryInj::find()->all(),'BOND_GEN_NO','BOND_NAME') ;
        
        
        
        $searchClnMedicineTestSearchModel = new \app\models\ClnMedicineTestSearch() ;  
        $queryParams = array();
        $queryParams = Yii::$app->request->queryParams ;
        $queryParams['ClnMedicineTestSearch']['TRAN_INJ_GEN_NO'] = $id ;
        $dataClnMedicineTestProvider = $searchClnMedicineTestSearchModel->search($queryParams) ; //Yii::$app->request->queryParams); 
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TRAN_INJ_GEN_NO]);
        } else {
            return $this->render('update', [
                'model' => $model ,
                'modelClnDiagnose' => $modelClnDiagnose ,
                'sportItems' => $sportItems ,
                'causeItems' => $causeItems ,
                'bondItems' => $bondItems ,
                'searchClnMedicineTestSearchModel' => $searchClnMedicineTestSearchModel,
                'dataClnMedicineTestProvider' => $dataClnMedicineTestProvider,
            ]);
        }
    }

    /**
     * Deletes an existing ClnTranInj model.
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
     * Finds the ClnTranInj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnTranInj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnTranInj::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
