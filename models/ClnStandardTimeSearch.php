<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnStandardTime;

/**
 * ClnStandardTimeSearch represents the model behind the search form about `app\models\ClnStandardTime`.
 */
class ClnStandardTimeSearch extends ClnStandardTime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STANDARD_TIME_GEN_NO', 'VERSION'], 'integer'],
            [['DATE_BEGIN', 'DATE_END', 'MONTH_BEGIN', 'MONTH_END', 'YEAR_BEGIN', 'YEAR_END', 'STANDARD_TIME', 'CREATE_BY', 'CREATE_DATE', 'UPDATE_BY', 'UPDATE_DATE'], 'safe'],
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
        $query = ClnStandardTime::find();

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
            'STANDARD_TIME_GEN_NO' => $this->STANDARD_TIME_GEN_NO,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'VERSION' => $this->VERSION,
        ]);

        $query->andFilterWhere(['like', 'DATE_BEGIN', $this->DATE_BEGIN])
            ->andFilterWhere(['like', 'DATE_END', $this->DATE_END])
            ->andFilterWhere(['like', 'MONTH_BEGIN', $this->MONTH_BEGIN])
            ->andFilterWhere(['like', 'MONTH_END', $this->MONTH_END])
            ->andFilterWhere(['like', 'YEAR_BEGIN', $this->YEAR_BEGIN])
            ->andFilterWhere(['like', 'YEAR_END', $this->YEAR_END])
            ->andFilterWhere(['like', 'STANDARD_TIME', $this->STANDARD_TIME])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY]);

        return $dataProvider;
    }
}
