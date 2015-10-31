<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnMedicineTest;

/**
 * ClnMedicineTestSearch represents the model behind the search form about `app\models\ClnMedicineTest`.
 */
class ClnMedicineTestSearch extends ClnMedicineTest
{
    public $cureName ;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEDICINE_GEN_NO', 'TRAN_INJ_GEN_NO', 'UNIT_POINT', 'DISCOUNT', 'VERSION'], 'integer'],
            [['EXPENSES', 'TOTAL'], 'number'],
            [['UPDATE_BY', 'UPDATE_DATE', 'CREATE_DATE', 'CREATE_BY','CURE_GEN_NO'], 'safe'],
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
        $query = ClnMedicineTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
          
            return $dataProvider;
        }
        
        $query->joinWith('clncure');
        $query->andFilterWhere([
            'MEDICINE_GEN_NO' => $this->MEDICINE_GEN_NO,
            'TRAN_INJ_GEN_NO' => $this->TRAN_INJ_GEN_NO,
            //'CURE_GEN_NO' => $this->CURE_GEN_NO,
            'EXPENSES' => $this->EXPENSES,
            'UNIT_POINT' => $this->UNIT_POINT,
            'DISCOUNT' => $this->DISCOUNT,
            'TOTAL' => $this->TOTAL,
            'VERSION' => $this->VERSION,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'CREATE_DATE' => $this->CREATE_DATE,
        ]);

        $query->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'CLN_CURE.CURE_NAME', $this->CURE_GEN_NO]);
 
        return $dataProvider;
    }
}
