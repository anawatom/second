<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CLN_TRAN_INJ_RESP".
 *
 * @property integer $TRAN_INJ_RESP_ID
 * @property integer $STAFF_ID
 * @property string $CREATE_BY
 * @property string $CREATE_DATE
 * @property integer $TRAN_INJ_GEN_NO
 */
class ClnTranInjResp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CLN_TRAN_INJ_RESP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRAN_INJ_RESP_ID'], 'required'],
            [['TRAN_INJ_RESP_ID', 'STAFF_ID', 'TRAN_INJ_GEN_NO'], 'integer'],
            [['CREATE_BY'], 'string', 'max' => 50],
            [['CREATE_DATE'], 'safe'],
            [['TRAN_INJ_RESP_ID'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TRAN_INJ_RESP_ID' => Yii::t('app', 'Tran  Inj  Resp  ID'),
            'STAFF_ID' => Yii::t('app', 'Staff  ID'),
            'CREATE_BY' => Yii::t('app', 'Create  By'),
            'CREATE_DATE' => Yii::t('app', 'Create  Date'),
            'TRAN_INJ_GEN_NO' => Yii::t('app', 'Tran  Inj  Gen  No'),
        ];
    }
    
    public function getClnStaff()
    {
        return $this->hasOne(ClnStaff::className(), ['STAFF_ID' => 'STAFF_ID']);
    }
    
    public static function getNewID(){
    	$command = Yii::$app->db->createCommand("select CLN_TRAN_INJ_RESP_SEQ.nextval as ID from dual");
        $result= $command->queryAll();
        return $result[0]['ID'];
    }
}
