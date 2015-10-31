<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnSport;

/**
 * ClnSportSearch represents the model behind the search form about `app\models\ClnSport`.
 */
class ClnSportSearch extends ClnSport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SPORT_GEN_NO', 'VERSION'], 'integer'],
            [['SPORT_CODE', 'SPORT_NAME', 'CREATE_BY', 'CREATE_DATE', 'UPDATE_BY', 'UPDATE_DATE'], 'safe'],
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
        $query = ClnSport::find();

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
            'SPORT_GEN_NO' => $this->SPORT_GEN_NO,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'VERSION' => $this->VERSION,
        ]);

        $query->andFilterWhere(['like', 'SPORT_CODE', $this->SPORT_CODE])
            ->andFilterWhere(['like', 'SPORT_NAME', $this->SPORT_NAME])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY]);

        return $dataProvider;
    }
}
