<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_CAUSE_INJ".
 *
 * @property integer $CAUSE_GEN_NO
 * @property string $CAUSE_CODE
 * @property string $CAUSE_NAME
 * @property string $CAUSE_TYPE
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnCauseInj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_CAUSE_INJ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CAUSE_GEN_NO'], 'required'],
            [['CAUSE_GEN_NO', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['CAUSE_CODE'], 'string', 'max' => 5],
            [['CAUSE_NAME'], 'string', 'max' => 255],
            [['CAUSE_TYPE'], 'string', 'max' => 1],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['CAUSE_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CAUSE_GEN_NO' => 'รหัสgenสาเหตุการบาดเจ็บ',
            'CAUSE_CODE' => 'รหัสสาเหตุการบาดเจ็บ',
            'CAUSE_NAME' => 'ชื่อสาเหตุการบาดเจ็บ',
            'CAUSE_TYPE' => 'ประเภทการบาดเจ็บ1-กีฬา 2-ทั่วไป',
            'CREATE_BY' => 'สร้างโดย',
            'CREATE_DATE' => 'วันที่สร้าง',
            'UPDATE_BY' => 'ปรับปรุงโดย',
            'UPDATE_DATE' => 'วันที่ปรับปรุง',
            'VERSION' => 'Version',
        ];
    }
}
