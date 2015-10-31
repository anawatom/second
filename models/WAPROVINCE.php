<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "WA_PROVINCE".
 *
 * @property string $PROVINCE_CODE
 * @property string $REGION_CODE
 * @property string $ZONE_CODE
 * @property string $PROVINCE_NAME_TH
 * @property string $PROVINCE_NAME_EN
 * @property string $CREATE_USER_ID
 * @property string $CREATE_TIME
 * @property string $LAST_UPD_USER_ID
 * @property string $LAST_UPD_TIME
 */
class WAPROVINCE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'WA_PROVINCE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROVINCE_CODE', 'REGION_CODE', 'PROVINCE_NAME_TH', 'CREATE_USER_ID', 'CREATE_TIME', 'LAST_UPD_USER_ID', 'LAST_UPD_TIME'], 'required'],
            [['PROVINCE_CODE', 'REGION_CODE', 'ZONE_CODE'], 'string', 'max' => 2],
            [['PROVINCE_NAME_TH', 'PROVINCE_NAME_EN'], 'string', 'max' => 100],
            [['CREATE_USER_ID', 'LAST_UPD_USER_ID'], 'string', 'max' => 50],
            [['CREATE_TIME', 'LAST_UPD_TIME'], 'string', 'max' => 7],
            [['PROVINCE_CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROVINCE_CODE' => '???????????',
            'REGION_CODE' => '???????',
            'ZONE_CODE' => '??????????????',
            'PROVINCE_NAME_TH' => '??????????? (???)',
            'PROVINCE_NAME_EN' => 'Province  Name  En',
            'CREATE_USER_ID' => '???????????????',
            'CREATE_TIME' => '???????????????????',
            'LAST_UPD_USER_ID' => '?????????????????????',
            'LAST_UPD_TIME' => '?????????????????????',
        ];
    }
}
