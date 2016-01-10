<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_SUB_ACTIVITY".
 *
 * @property integer $SUB_ACTIVITY_GEN_NO
 * @property integer $SPORT_GEN_NO
 * @property string $ACTIVITY_DATE
 * @property integer $QTY_HEALTH
 * @property integer $QTY_AID
 * @property integer $QTY_DOC
 * @property integer $QTY_TRAIN
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnSubActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_SUB_ACTIVITY';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUB_ACTIVITY_GEN_NO', 'SPORT_GEN_NO', 'ACTIVITY_DATE'], 'required'],
            [['SUB_ACTIVITY_GEN_NO', 'SPORT_GEN_NO', 'QTY_HEALTH', 'QTY_AID', 'QTY_DOC', 'QTY_TRAIN', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['ACTIVITY_DATE'], 'string', 'max' => 7],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['SUB_ACTIVITY_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SUB_ACTIVITY_GEN_NO' => Yii::t('app', 'รหัสgenกิจกรรมย่อย'),
            'SPORT_GEN_NO' => Yii::t('app', 'รหัสประจำรายการ'),
            'ACTIVITY_DATE' => Yii::t('app', 'วันที่ออกตรวจ'),
            'QTY_HEALTH' => Yii::t('app', 'จำนวนคนที่ถูกประเมินสุขภาพ'),
            'QTY_AID' => Yii::t('app', 'ปฐมพยาบาลประจำสนามแข่งขัน'),
            'QTY_DOC' => Yii::t('app', 'เอกสารแจก(ชิ้น)'),
            'QTY_TRAIN' => Yii::t('app', 'การฝึกอบรม'),
            'CREATE_BY' => Yii::t('app', 'สร้างโดย'),
            'CREATE_DATE' => Yii::t('app', 'วันที่สร้าง'),
            'UPDATE_BY' => Yii::t('app', 'ปรับปรุงโดย'),
            'UPDATE_DATE' => Yii::t('app', 'วันที่ปรับปรุง'),
            'VERSION' => Yii::t('app', 'Version'),
        ];
    }
}
