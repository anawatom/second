<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnTranInjTest;

/**
 * ClnTranInjTestSearch represents the model behind the search form about `app\models\ClnTranInjTest`.
 */
class ClnTranInjTestSearch extends ClnTranInjTest
{
    
    
    public $SHOW_REG_NO ;
    public $SHOW_NAME ;
            
    /**
     * @inheritdoc
     */        
    public function rules()
    {
        return [
            [['TRAN_INJ_GEN_NO', 'REGISTER_GEN_NO', 'VERSION'], 'integer'],
            [['TRAN_INJ_DATE', 'UPDATE_BY', 'UPDATE_DATE', 'CREATE_DATE', 'CREATE_BY', 'REGIS_TIME', 'WAIT_TRAN_TIME', 'TRAN_TIME', 'RECV_MEDIC_TIME', 'PAID_TIME'], 'safe'],
            [['SHOW_REG_NO', 'SHOW_NAME'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ClnTranInjTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        
        $dataProvider->setSort([
            'attributes' => [
                //'id',
                'TRAN_INJ_GEN_NO' ,
                'SHOW_REG_NO' => [
                    'asc' => ['clnRegister.SHOW_REG_NO' => SORT_ASC],
                    'desc' => ['clnRegister.SHOW_REG_NO' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
                'SHOW_NAME' => [
                    'asc' => ['clnRegister.SHOW_NAME' => SORT_ASC],
                    'desc' => ['clnRegister.SHOW_NAME' => SORT_DESC],
                    'label' => 'Country Name'
                ]
            ]
        ]);
        
        //$this->load($params);
        if (!($this->load($params) && $this->validate())) {
            /**
             * The following line will allow eager loading with country data 
             * to enable sorting by country on initial loading of the grid.
             */ 
            $query->joinWith(['clnRegister']);
            return $dataProvider;
        }
        
        
        //if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
        //    return $dataProvider;
        //}
       /* $this->addCondition($query, 'TRAN_INJ_GEN_NO');
        $this->addCondition($query, 'SHOW_REG_NO', true);
        $this->addCondition($query, 'SHOW_NAME', true);
        $this->addCondition($query, 'REGISTER_GEN_NO'); */
        
        $query->andFilterWhere([
            'TRAN_INJ_GEN_NO' => $this->TRAN_INJ_GEN_NO,
            'REGISTER_GEN_NO' => $this->REGISTER_GEN_NO,
            'VERSION' => $this->VERSION,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'CREATE_DATE' => $this->CREATE_DATE,
        ]);
        
        if ($this->TRAN_INJ_DATE) {
            $date = Yii::$app->utilsHelper->convThFormatDate($this->TRAN_INJ_DATE,'dd MM yyyy','dd/mm/yyyy');
            $query->andFilterWhere(['between','TRAN_INJ_DATE',  new \yii\db\Expression("to_date('$date 00:00:00','dd/mm/yyyy hh24:mi:ss')") , new \yii\db\Expression("to_date('$date 23:59:59','dd/mm/yyyy hh24:mi:ss')")] ) ;             
        }

        $query->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'REGIS_TIME', $this->REGIS_TIME])
            ->andFilterWhere(['like', 'WAIT_TRAN_TIME', $this->WAIT_TRAN_TIME])
            ->andFilterWhere(['like', 'TRAN_TIME', $this->TRAN_TIME])
            ->andFilterWhere(['like', 'RECV_MEDIC_TIME', $this->RECV_MEDIC_TIME])
            ->andFilterWhere(['like', 'PAID_TIME', $this->PAID_TIME]);

        $query->joinWith(['clnRegister' => function ($q) {
            if ($this->SHOW_REG_NO != "") {
                $q->where("cln_register.SHOW_REG_NO LIKE '%" . $this->SHOW_REG_NO . "%'") ;
            }
            if ($this->SHOW_NAME != "") {
                $q->where("cln_register.SHOW_NAME LIKE '%" . $this->SHOW_NAME . "%'"); 
            }
              
            
        }]);
    
        return $dataProvider;
    }
}
