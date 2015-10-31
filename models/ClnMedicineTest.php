<?php

namespace app\models;

use Yii;
use app\models\ClnCure;
/**
 * This is the model class for table "CLN_MEDICINE_TEST".
 *
 * @property integer $MEDICINE_GEN_NO
 * @property integer $TRAN_INJ_GEN_NO
 * @property integer $CURE_GEN_NO
 * @property string $EXPENSES
 * @property integer $UNIT_POINT
 * @property integer $DISCOUNT
 * @property string $TOTAL
 * @property integer $VERSION
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property string $CREATE_DATE
 * @property string $CREATE_BY
 * 
 * @property ClnCure $clnCure
 */
class ClnMedicineTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_MEDICINE_TEST';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEDICINE_GEN_NO', 'UNIT_POINT','DISCOUNT'], 'required'],
            [['MEDICINE_GEN_NO', 'TRAN_INJ_GEN_NO', 'CURE_GEN_NO', 'UNIT_POINT', 'DISCOUNT', 'VERSION'], 'integer'],
            [['DISCOUNT'], 'number','min'=>0,'max'=>100],
            [['EXPENSES', 'TOTAL'], 'number'],
            [['UPDATE_DATE', 'CREATE_DATE'], 'safe'],
            [['UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEDICINE_GEN_NO' => 'Medicine  Gen  No',
            'TRAN_INJ_GEN_NO' => 'Tran  Inj  Gen  No',
            'CURE_GEN_NO' => 'การรักษา',
            'EXPENSES' => 'ค่าบริการ',
            'UNIT_POINT' => 'จำนวนจุด',
            'DISCOUNT' => 'ส่วนลด (%)',
            'TOTAL' => 'จำนวนเงิน',
            'VERSION' => 'Version',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
        //    'clncure_cure_gen_no' => 'dddd' ,
        ];
    }
    
    public static function getNewID(){
    	$command = Yii::$app->db->createCommand("select CLN_MEDICINE_TEST_SEQ.nextval as ID from dual");
        $result= $command->queryAll();
        return $result[0]['ID'];
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getClncure()
    {
        return $this->hasOne(ClnCure::className(), ['CURE_GEN_NO' => 'CURE_GEN_NO']);
    }
    

}
