<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_DIAGNOSE".
 *
 * @property integer $DIAGNOSE_GEN_NO
 * @property integer $TRAN_INJ_GEN_NO
 * @property string $DIAGNOSE_TYPE
 * @property integer $SPORT_GEN_NO
 * @property integer $BOND_GEN_NO
 * @property integer $CAUSE_GEN_NO
 * @property string $CAUSE_OTHER
 * @property string $DIAGNOSE
 * @property string $DOCTOR_NAME
 * @property integer $VERSION
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 */
class ClnDiagnose extends \yii\db\ActiveRecord
{
    public $title = 'ผลการตรวจ' ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_DIAGNOSE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DIAGNOSE_GEN_NO'], 'required'],
            [['DIAGNOSE_GEN_NO', 'TRAN_INJ_GEN_NO', 'SPORT_GEN_NO', 'BOND_GEN_NO', 'CAUSE_GEN_NO', 'VERSION'], 'integer'],
            [['UPDATE_DATE', 'CREATE_DATE'], 'safe'],
            [['DIAGNOSE_TYPE'], 'string', 'max' => 1],
            [['CAUSE_OTHER'], 'string', 'max' => 255],
            [['DIAGNOSE'], 'string', 'max' => 500],
            [['DOCTOR_NAME', 'UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100],
            [['DIAGNOSE_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DIAGNOSE_GEN_NO' => 'รหัสgenการวินิจฉัย',
            'TRAN_INJ_GEN_NO' => 'รหัสgenระเบียนผู้ป่วย',
            'DIAGNOSE_TYPE' => 'ประเภท',
            'SPORT_GEN_NO' => 'ชนิดกีฬา',
            'BOND_GEN_NO' => 'บริเวณที่บาดเจ็บ',
            'CAUSE_GEN_NO' => 'สาเหตุการบาดเจ็บ',
            'CAUSE_OTHER' => 'สาเหตุการบาดเจ็บอื่นๆ',
            'DIAGNOSE' => 'การวินิจฉัยโรค',
            'DOCTOR_NAME' => 'แพทย์ผู้ตรวจ',
            'VERSION' => 'Version FW',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_BY' => 'Create  By',
            'CREATE_DATE' => 'Create  Date',
            
            'title' => 'ผลการตรวจ' ,
        ];
    }
}
