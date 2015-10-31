<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_TITLE".
 *
 * @property integer $TITLE_GEN_NO
 * @property string $TITLE_CODE
 * @property string $TITLE_NAME
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnTitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_TITLE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TITLE_GEN_NO', 'TITLE_CODE'], 'required'],
            [['TITLE_GEN_NO', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['TITLE_CODE'], 'string', 'max' => 5],
            [['TITLE_NAME'], 'string', 'max' => 255],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['TITLE_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TITLE_GEN_NO' => 'รหัสgenคำนำหน้า',
            'TITLE_CODE' => 'รหัสคำนำหน้า',
            'TITLE_NAME' => 'Title  Name',
            'CREATE_BY' => 'สร้างโดย',
            'CREATE_DATE' => 'วันที่สร้าง',
            'UPDATE_BY' => 'ปรับปรุงโดย',
            'UPDATE_DATE' => 'วันที่ปรับปรุง',
            'VERSION' => 'Version',
        ];
    }
}
