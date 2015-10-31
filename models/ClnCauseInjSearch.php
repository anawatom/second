<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnCauseInj;

/**
 * ClnCauseInjSearch represents the model behind the search form about `app\models\ClnCauseInj`.
 */
class ClnCauseInjSearch extends ClnCauseInj
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CAUSE_GEN_NO', 'VERSION'], 'integer'],
            [['CAUSE_CODE', 'CAUSE_NAME', 'CAUSE_TYPE', 'CREATE_BY', 'CREATE_DATE', 'UPDATE_BY', 'UPDATE_DATE'], 'safe'],
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
        $query = ClnCauseInj::find();

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
            'CAUSE_GEN_NO' => $this->CAUSE_GEN_NO,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'VERSION' => $this->VERSION,
        ]);

        $query->andFilterWhere(['like', 'CAUSE_CODE', $this->CAUSE_CODE])
            ->andFilterWhere(['like', 'CAUSE_NAME', $this->CAUSE_NAME])
            ->andFilterWhere(['like', 'CAUSE_TYPE', $this->CAUSE_TYPE])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY]);

        return $dataProvider;
    }
}
