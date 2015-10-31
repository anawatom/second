<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_REGISTER".
 *
 * @property integer $REGISTER_GEN_NO
 * @property integer $REG_CODE
 * @property integer $REG_YEAR
 * @property integer $TITLE_GEN_NO
 * @property string $NAME
 * @property string $SNAME
 * @property string $SEX
 * @property string $AGE
 * @property string $ADDRESS
 * @property string $TEL
 * @property string $OCCUPATION
 * @property string $PLACE_OCCUPATION
 * @property string $TEL_OCCUPATION
 * @property string $TYPE_CARD
 * @property string $ID_CARD
 * @property string $ALLERGIC
 * @property string $SHOW_REG_NO
 * @property string $SHOW_NAME
 * @property integer $VERSION
 * @property string $UPDATE_BY
 * @property string $UPDATE_DATE
 * @property string $CREATE_DATE
 * @property string $CREATE_BY
 */
class ClnRegister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_REGISTER';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REGISTER_GEN_NO', 'REG_CODE', 'REG_YEAR'], 'required'],
            [['REGISTER_GEN_NO', 'REG_CODE', 'REG_YEAR', 'TITLE_GEN_NO', 'VERSION'], 'integer'],
            [['UPDATE_DATE', 'CREATE_DATE'], 'safe'],
            [['NAME', 'SNAME', 'SHOW_NAME'], 'string', 'max' => 255],
            [['SEX', 'TYPE_CARD'], 'string', 'max' => 1],
            [['AGE'], 'string', 'max' => 3],
            [['ADDRESS', 'PLACE_OCCUPATION'], 'string', 'max' => 200],
            [['TEL', 'TEL_OCCUPATION'], 'string', 'max' => 15],
            [['OCCUPATION', 'ID_CARD', 'SHOW_REG_NO'], 'string', 'max' => 50],
            [['ALLERGIC'], 'string', 'max' => 500],
            [['UPDATE_BY', 'CREATE_BY'], 'string', 'max' => 100],
            [['REGISTER_GEN_NO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'REGISTER_GEN_NO' => 'รหัสgenเลขระเบียน',
            'REG_CODE' => 'เลขที่ระเบียนคนไข้',
            'REG_YEAR' => 'ปี',
            'TITLE_GEN_NO' => 'รหัสgenคำนำหน้า',
            'NAME' => 'ชื่อ',
            'SNAME' => 'นามสกุล',
            'SEX' => 'M-ชาย, F-หญิง',
            'AGE' => 'อายุ',
            'ADDRESS' => 'ที่อยู่',
            'TEL' => 'โทรศัพท์',
            'OCCUPATION' => 'อาชีพ',
            'PLACE_OCCUPATION' => 'สถานที่ทำงาน',
            'TEL_OCCUPATION' => 'เบอร์โทรที่ทำงาน',
            'TYPE_CARD' => '1-บัตรประชาชน, 2-ข้าราชการ, 3-นักเรียน, 4-นักศึกษา,5-Passport, 6-คนต่างด้าว',
            'ID_CARD' => 'เลขบัตร',
            'ALLERGIC' => 'แพ้ยา',
            'SHOW_REG_NO' => 'แสดงเวชระเบียน',
            'SHOW_NAME' => 'แสดงชื่อสกุลเต็ม',
            'VERSION' => 'Version FW',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_DATE' => 'Update  Date',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
        ];
    }
}
