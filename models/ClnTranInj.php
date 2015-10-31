<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_TRAN_INJ".
 *
 * @property integer $TRAN_INJ_GEN_NO
 * @property integer $REGISTER_GEN_NO
 * @property string $TRAN_INJ_DATE
 * @property integer $VERSION
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property string $CREATE_DATE
 * @property string $CREATE_BY
 */
class ClnTranInj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_TRAN_INJ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRAN_INJ_GEN_NO'], 'required'],
            [['TRAN_INJ_GEN_NO', 'REGISTER_GEN_NO', 'VERSION'], 'integer'],
            [['UPDATE_DATE', 'CREATE_DATE'], 'safe'],
            [['TRAN_INJ_DATE'], 'string', 'max' => 7],
            [['UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100],
            [['TRAN_INJ_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TRAN_INJ_GEN_NO' => 'รหัสgenระเบียนผู้ป่วย',
            'REGISTER_GEN_NO' => 'รหัสgenเลขระเบียน',
            'TRAN_INJ_DATE' => 'วันที่รับการรักษา',
            'VERSION' => 'Version FW',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
        ];
    }
}
