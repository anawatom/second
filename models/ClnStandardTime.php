<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_STANDARD_TIME".
 *
 * @property integer $STANDARD_TIME_GEN_NO
 * @property string $DATE_BEGIN
 * @property string $DATE_END
 * @property string $MONTH_BEGIN
 * @property string $MONTH_END
 * @property string $YEAR_BEGIN
 * @property string $YEAR_END
 * @property string $STANDARD_TIME
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnStandardTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_STANDARD_TIME';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STANDARD_TIME_GEN_NO'], 'required'],
            [['STANDARD_TIME_GEN_NO', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['DATE_BEGIN', 'DATE_END'], 'string', 'max' => 7],
            [['MONTH_BEGIN', 'MONTH_END'], 'string', 'max' => 2],
            [['YEAR_BEGIN', 'YEAR_END'], 'string', 'max' => 4],
            [['STANDARD_TIME'], 'string', 'max' => 5],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['STANDARD_TIME_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STANDARD_TIME_GEN_NO' => Yii::t('app', 'รหัสgenเวลามาตรฐาน'),
            'DATE_BEGIN' => Yii::t('app', 'วันที่เริ่มต้น'),
            'DATE_END' => Yii::t('app', 'วันที่สิ้นสุด'),
            'MONTH_BEGIN' => Yii::t('app', 'เดือนเริ่มต้น'),
            'MONTH_END' => Yii::t('app', 'เดือนสิ้นสุด'),
            'YEAR_BEGIN' => Yii::t('app', 'ปีเริ่มต้น'),
            'YEAR_END' => Yii::t('app', 'Year  End'),
            'STANDARD_TIME' => Yii::t('app', 'เวลามาตรฐาน (HH24:MM:SS)'),
            'CREATE_BY' => Yii::t('app', 'สร้างโดย'),
            'CREATE_DATE' => Yii::t('app', 'วันที่สร้าง'),
            'UPDATE_BY' => Yii::t('app', 'ปรับปรุงโดย'),
            'UPDATE_DATE' => Yii::t('app', 'วันที่ปรับปรุง'),
            'VERSION' => Yii::t('app', 'Version'),
        ];
    }
}
