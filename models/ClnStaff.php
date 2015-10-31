<?php

namespace app\models;

use Yii;
use app\models\ClnTitle;

/**
 * This is the model class for table "CLN_STAFF".
 *
 * @property integer $STAFF_ID
 * @property integer $TITLE_GEN_NO
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property string $GENDER
 * @property string $BIRTH_DATE
 * @property string $STAFF_TYPE
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property string $LAST_UPD_BY
 * @property string $LAST_UPD_DATE
 */
class ClnStaff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_STAFF';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STAFF_ID', 'TITLE_GEN_NO', 'FIRST_NAME', 'LAST_NAME', 'GENDER','STAFF_TYPE'], 'required'],
            [[ 'TITLE_GEN_NO'], 'integer'], //'STAFF_ID',
            [['FIRST_NAME', 'LAST_NAME'], 'string', 'max' => 100],
            [['GENDER', 'STAFF_TYPE'], 'string', 'max' => 2],
            //[['BIRTH_DATE', 'CREATE_DATE', 'LAST_UPD_DATE'], 'date'],//, 'max' => 7],
            [['CREATE_BY', 'LAST_UPD_BY'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STAFF_ID' => 'Staff  ID',
            'TITLE_GEN_NO' => 'คำนำหน้าชื่อ',
            'FIRST_NAME' => 'ชื่อ',
            'LAST_NAME' => 'นามสกุล',
            'GENDER' => 'เพศ',
            'BIRTH_DATE' => 'วันเกิด',
            'STAFF_TYPE' => 'ประเภทบุคลากร',
            'CREATE_BY' => 'Create  By',
            'CREATE_DATE' => 'Create  Date',
            'LAST_UPD_BY' => 'Last  Upd  By',
            'LAST_UPD_DATE' => 'Last  Upd  Date',
        ];
    }
    public function relations() {
            return array(
                    'title' => array(self::BELONGS_TO, 'ClnTitle', 'TITLE_GEN_NO'),
            );
    }    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClnTitle()
    {
        return $this->hasOne(ClnTitle::className(), ['TITLE_GEN_NO' => 'TITLE_GEN_NO']);
    }    
}
