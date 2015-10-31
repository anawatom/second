<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_BOUNDARY_INJ".
 *
 * @property integer $BOND_GEN_NO
 * @property string $BOND_CODE
 * @property string $BOND_NAME
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property integer $VERSION
 */
class ClnBoundaryInj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_BOUNDARY_INJ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BOND_GEN_NO'], 'required'],
            [['BOND_GEN_NO', 'VERSION'], 'integer'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['BOND_CODE'], 'string', 'max' => 5],
            [['BOND_NAME'], 'string', 'max' => 255],
            [['CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 100],
            [['BOND_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BOND_GEN_NO' => 'รหัสgenบริเวณที่บาดเจ็บ',
            'BOND_CODE' => 'รหัสบริเวณที่บาดเจ็บ',
            'BOND_NAME' => 'ชื่อบริเวณที่บาดเจ็บ',
            'CREATE_BY' => 'สร้างโดย',
            'CREATE_DATE' => 'วันที่สร้าง',
            'UPDATE_BY' => 'ปรับปรุงโดย',
            'UPDATE_DATE' => 'วันที่ปรับปรุง',
            'VERSION' => 'Version',
        ];
    }
}
