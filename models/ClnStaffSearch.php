<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnStaff;

/**
 * ClnStaffSearch represents the model behind the search form about `app\models\ClnStaff`.
 */
class ClnStaffSearch extends ClnStaff
{
    public $clnTitle;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STAFF_ID', 'TITLE_GEN_NO'], 'integer'],
            [['FIRST_NAME', 'LAST_NAME', 'GENDER', 'BIRTH_DATE', 'STAFF_TYPE', 'CREATE_BY', 'CREATE_DATE', 'LAST_UPD_BY', 'LAST_UPD_DATE'], 'safe'],
            [['clnTitle'], 'safe'],
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
        $query = ClnStaff::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
       
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'STAFF_ID' => $this->STAFF_ID,
            'TITLE_GEN_NO' => $this->TITLE_GEN_NO,
        ]);

        $query->andFilterWhere(['like', 'FIRST_NAME', $this->FIRST_NAME])
            ->andFilterWhere(['like', 'LAST_NAME', $this->LAST_NAME])
            ->andFilterWhere(['like', 'GENDER', $this->GENDER])
            ->andFilterWhere(['like', 'BIRTH_DATE', $this->BIRTH_DATE])
            ->andFilterWhere(['like', 'STAFF_TYPE', $this->STAFF_TYPE])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'CREATE_DATE', $this->CREATE_DATE])
            ->andFilterWhere(['like', 'LAST_UPD_BY', $this->LAST_UPD_BY])
            ->andFilterWhere(['like', 'LAST_UPD_DATE', $this->LAST_UPD_DATE]);
        
       
        $query->with=array('clnTitle'); //jointable                                  
    
        return $dataProvider;
    }
}
