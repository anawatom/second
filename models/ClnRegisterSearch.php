<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnRegister;

/**
 * ClnRegisterSearch represents the model behind the search form about `app\models\ClnRegister`.
 */
class ClnRegisterSearch extends ClnRegister
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REGISTER_GEN_NO', 'REG_CODE', 'REG_YEAR', 'TITLE_GEN_NO', 'VERSION'], 'integer'],
            [['NAME', 'SNAME', 'SEX', 'AGE', 'ADDRESS', 'TEL', 'OCCUPATION', 'PLACE_OCCUPATION', 'TEL_OCCUPATION', 'TYPE_CARD', 'ID_CARD', 'ALLERGIC', 'SHOW_REG_NO', 'SHOW_NAME', 'UPDATE_BY', 'UPDATE_DATE', 'CREATE_DATE', 'CREATE_BY'], 'safe'],
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
        $query = ClnRegister::find();

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
            'REGISTER_GEN_NO' => $this->REGISTER_GEN_NO,
            'REG_CODE' => $this->REG_CODE,
            'REG_YEAR' => $this->REG_YEAR,
            'TITLE_GEN_NO' => $this->TITLE_GEN_NO,
            'VERSION' => $this->VERSION,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'CREATE_DATE' => $this->CREATE_DATE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'SNAME', $this->SNAME])
            ->andFilterWhere(['like', 'SEX', $this->SEX])
            ->andFilterWhere(['like', 'AGE', $this->AGE])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS])
            ->andFilterWhere(['like', 'TEL', $this->TEL])
            ->andFilterWhere(['like', 'OCCUPATION', $this->OCCUPATION])
            ->andFilterWhere(['like', 'PLACE_OCCUPATION', $this->PLACE_OCCUPATION])
            ->andFilterWhere(['like', 'TEL_OCCUPATION', $this->TEL_OCCUPATION])
            ->andFilterWhere(['like', 'TYPE_CARD', $this->TYPE_CARD])
            ->andFilterWhere(['like', 'ID_CARD', $this->ID_CARD])
            ->andFilterWhere(['like', 'ALLERGIC', $this->ALLERGIC])
            ->andFilterWhere(['like', 'SHOW_REG_NO', $this->SHOW_REG_NO])
            ->andFilterWhere(['like', 'SHOW_NAME', $this->SHOW_NAME])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY]);

        return $dataProvider;
    }
}
