<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnCure;

/**
 * ClnCureSearch represents the model behind the search form about `app\models\ClnCure`.
 */
class ClnCureSearch extends ClnCure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CURE_GEN_NO', 'VERSION'], 'integer'],
            [['CURE_CODE', 'CURE_NAME', 'CREATE_BY', 'CREATE_DATE', 'UPDATE_BY', 'UPDATE_DATE'], 'safe'],
            [['CURE_EXPENSES'], 'number'],
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
        $query = ClnCure::find();

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
            'CURE_GEN_NO' => $this->CURE_GEN_NO,
            'CURE_EXPENSES' => $this->CURE_EXPENSES,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'VERSION' => $this->VERSION,
        ]);

        $query->andFilterWhere(['like', 'CURE_CODE', $this->CURE_CODE])
            ->andFilterWhere(['like', 'CURE_NAME', $this->CURE_NAME])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY]);

        return $dataProvider;
    }
}
