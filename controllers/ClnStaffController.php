<?php

namespace app\controllers;

use Yii;
use app\models\ClnStaff;
use app\models\ClnStaffSearch;
use app\models\ClnTitle ;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;



/**
 * ClnStaffController implements the CRUD actions for ClnStaff model.
 */
class ClnstaffController extends Controller
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
     * Lists all ClnStaff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClnStaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClnStaff model.
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
     * Creates a new ClnStaff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClnStaff();
        $titleItems = ArrayHelper::map(ClnTitle::find()->orderBy('TITLE_NAME')->asArray()->all(), 'TITLE_GEN_NO', 'TITLE_NAME') ;
        $staffTypeItems = ['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล'] ;
                
        if ( $model->load(Yii::$app->request->post()) ) {
                $model->STAFF_ID = new \yii\db\Expression('CLN_STAFF_SEQ.nextval') ;
                $model->CREATE_BY = 'admin' ;
                $model->CREATE_DATE = new \yii\db\Expression('SYSDATE');
                $model->LAST_UPD_BY = 'admin' ;
                $model->LAST_UPD_DATE = new \yii\db\Expression('SYSDATE');
                if ($model->save()) {
                        //print_r($model->getErrors());
                        return $this->redirect(['view', 'id' => $model->STAFF_ID]);
                }   else {
                    print_r($model->getErrors());
                }             
        } else {
                return $this->renderAjax('create', [
                    'model' => $model ,
                    'titleItems' => $titleItems ,
                    'staffTypeItems' => $staffTypeItems ,
                ]);
        }
    }

    /**
     * Updates an existing ClnStaff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $titleItems = ArrayHelper::map(ClnTitle::find()->orderBy('TITLE_NAME')->asArray()->all(), 'TITLE_GEN_NO', 'TITLE_NAME') ;
        $staffTypeItems = ['D'=>'แพทย์','P'=>'นักกายภาพบำบัด','N'=>'พยาบาล'] ;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return 'ddjdkjf' ;
//return $this->redirect(['view', 'id' => $model->STAFF_ID]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model ,
                'titleItems' => $titleItems ,
                'staffTypeItems' => $staffTypeItems ,
            ]);
        }
    }

    /**
     * Deletes an existing ClnStaff model.
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
     * Finds the ClnStaff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClnStaff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClnStaff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
