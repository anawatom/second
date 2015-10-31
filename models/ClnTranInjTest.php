<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_TRAN_INJ_TEST".
 *
 * @property integer $TRAN_INJ_GEN_NO
 * @property integer $REGISTER_GEN_NO
 * @property string $TRAN_INJ_DATE
 * @property integer $VERSION
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property string $CREATE_DATE
 * @property string $CREATE_BY
 * @property string $REGIS_TIME
 * @property string $WAIT_TRAN_TIME
 * @property string $TRAN_TIME
 * @property string $RECV_MEDIC_TIME
 * @property string $PAID_TIME
 */
class ClnTranInjTest extends \yii\db\ActiveRecord
{
    public $title = 'ผลการตรวจ' ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_TRAN_INJ_TEST';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            
            
            [[ 'REGISTER_GEN_NO', 'VERSION'], 'integer'],
            [['UPDATE_DATE', 'CREATE_DATE','DIAGNOSE_TYPE','SPORT_GEN_NO','BOND_GEN_NO','CAUSE_GEN_NO','CAUSE_OTHER','DIAGNOSE','DOCTOR_NAME'], 'safe'],
            //[['TRAN_INJ_DATE'], 'string', 'max' => 7],
            [['UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100],
            [['REGIS_TIME', 'WAIT_TRAN_TIME', 'TRAN_TIME', 'RECV_MEDIC_TIME', 'PAID_TIME'], 'string', 'max' => 8],
            [['TRAN_INJ_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TRAN_INJ_GEN_NO' => 'Tran  Inj  Gen  No',
            'REGISTER_GEN_NO' => 'Register  Gen  No',
            'TRAN_INJ_DATE' => 'Tran  Inj  Date',
            'VERSION' => 'Version',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
            'REGIS_TIME' => 'Regis  Time',
            'WAIT_TRAN_TIME' => 'Wait  Tran  Time',
            'TRAN_TIME' => 'Tran  Time',
            'RECV_MEDIC_TIME' => 'Recv  Medic  Time',
            'PAID_TIME' => 'Paid  Time',
            'DIAGNOSE_TYPE' => 'ประเภท',
            'SPORT_GEN_NO' => 'ชนิดกีฬา',
            'BOND_GEN_NO' => 'บริเวณที่บาดเจ็บ',
            'CAUSE_GEN_NO' => 'สาเหตุการบาดเจ็บ',
            'CAUSE_OTHER' => 'สาเหตุการบาดเจ็บอื่นๆ',
            'DIAGNOSE' => 'การวินิจฉัยโรค',
            'DOCTOR_NAME' => 'แพทย์ผู้ตรวจ',
        ];
    }
    
    public static function getNewID(){
    	$command = Yii::$app->db->createCommand("select cln_tran_inj_seq.nextval as ID from dual");
        $result= $command->queryAll();
        return $result[0]['ID'];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClnRegister()
    {
        return $this->hasOne(ClnRegister::className(), ['REGISTER_GEN_NO' => 'REGISTER_GEN_NO']);
    }    

    /* Getter for parent name */
    public function getSHOW_REG_NO() {
        return $this->clnRegister->SHOW_REG_NO;
    }
    
    public function getSHOW_NAME() {
        return $this->clnRegister->SHOW_NAME;
    }
}
