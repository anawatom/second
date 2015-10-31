<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_MEDICINE".
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
 */
class ClnMedicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_MEDICINE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEDICINE_GEN_NO'], 'required'],
            [['MEDICINE_GEN_NO', 'TRAN_INJ_GEN_NO', 'CURE_GEN_NO', 'UNIT_POINT', 'DISCOUNT', 'VERSION'], 'integer'],
            [['EXPENSES', 'TOTAL'], 'number'],
            [['UPDATE_DATE', 'CREATE_DATE'], 'safe'],
            [['UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100],
            [['MEDICINE_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEDICINE_GEN_NO' => 'รหัสgenค่ารักษาพยาบาล',
            'TRAN_INJ_GEN_NO' => 'รหัสgenระเบียนผู้ป่วย',
            'CURE_GEN_NO' => 'รหัสประจำรายการ',
            'EXPENSES' => 'ค่าบริการ',
            'UNIT_POINT' => 'จำนวนจุด',
            'DISCOUNT' => 'ส่วนลด',
            'TOTAL' => 'รวมเงิน',
            'VERSION' => 'Version FW',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
        ];
    }
}
