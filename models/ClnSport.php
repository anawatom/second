<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_SPORT".
 *
 * @property integer $SPORT_GEN_NO
 * @property string $SPORT_CODE
 * @property string $SPORT_NAME
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnSport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_SPORT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SPORT_GEN_NO', 'SPORT_CODE'], 'required'],
            [['SPORT_GEN_NO', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['SPORT_CODE'], 'string', 'max' => 5],
            [['SPORT_NAME'], 'string', 'max' => 255],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['SPORT_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SPORT_GEN_NO' => 'รหัสประจำรายการ',
            'SPORT_CODE' => 'รหัสชนิดกีฬา',
            'SPORT_NAME' => 'ชื่อชนิดกีฬา',
            'CREATE_BY' => 'สร้างโดย',
            'CREATE_DATE' => 'วันที่สร้าง',
            'UPDATE_BY' => 'ปรับปรุงโดย',
            'UPDATE_DATE' => 'วันที่ปรับปรุง',
            'VERSION' => 'Version',
        ];
    }
}
