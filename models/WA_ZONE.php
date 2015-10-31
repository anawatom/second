<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "WA_ZONE".
 *
 * @property string $ZONE_CODE
 * @property string $ZONE_NAME_TH
 * @property string $ZONE_NAME_EN
 * @property string $CREATE_USER_ID
 * @property date $CREATE_TIME
 * @property string $LAST_UPD_USER_ID
 * @property date $LAST_UPD_TIME
 */
class WA_ZONE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'WA_ZONE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ZONE_CODE', 'ZONE_NAME_TH', 'CREATE_USER_ID', 'CREATE_TIME', 'LAST_UPD_USER_ID', 'LAST_UPD_TIME'], 'required'],
            [['CREATE_TIME', 'LAST_UPD_TIME'], 'safe'],
            [['CREATE_TIME', 'LAST_UPD_TIME'], 'date'],
            [['ZONE_CODE'], 'string', 'max' => 2],
            [['ZONE_NAME_TH', 'ZONE_NAME_EN'], 'string', 'max' => 100],
            [['CREATE_USER_ID', 'LAST_UPD_USER_ID'], 'string', 'max' => 50],
            [['ZONE_CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ZONE_CODE' => '??????????????',
            'ZONE_NAME_TH' => '?????????????? (???)',
            'ZONE_NAME_EN' => '??????????? (eng)',
            'CREATE_USER_ID' => '???????????????',
            'CREATE_TIME' => '???????????????????',
            'LAST_UPD_USER_ID' => '?????????????????????',
            'LAST_UPD_TIME' => '?????????????????????',
        ];
    }
}
