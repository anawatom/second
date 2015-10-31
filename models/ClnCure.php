<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_CURE".
 *
 * @property integer $CURE_GEN_NO
 * @property string $CURE_CODE
 * @property string $CURE_NAME
 * @property string $CURE_EXPENSES
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnCure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_CURE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CURE_GEN_NO', 'CURE_CODE'], 'required'],
            [['CURE_GEN_NO', 'VERSION'], 'integer'],
            [['CURE_EXPENSES'], 'number'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['CURE_CODE'], 'string', 'max' => 5],
            [['CURE_NAME'], 'string', 'max' => 255],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['CURE_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CURE_GEN_NO' => 'รหัสgenวิธีการรักษา',
            'CURE_CODE' => 'รหัสวิธีการรักษา',
            'CURE_NAME' => 'ชื่อการรักษา',
            'CURE_EXPENSES' => 'ค่าบริการ',
            'CREATE_BY' => 'สร้างโดย',
            'CREATE_DATE' => 'วันที่สร้าง',
            'UPDATE_BY' => 'ปรับปรุงโดย',
            'UPDATE_DATE' => 'วันที่ปรับปรุง',
            'VERSION' => 'Version',
            'cureName' => Yii::t('app', 'Country Name') ,
        ];
    }


  
}
