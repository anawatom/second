<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnSubActivity;

/**
 * ClnSubActivitySearch represents the model behind the search form about `app\models\ClnSubActivity`.
 */
class ClnSubActivitySearch extends ClnSubActivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUB_ACTIVITY_GEN_NO', 'SPORT_GEN_NO', 'QTY_HEALTH', 'QTY_AID', 'QTY_DOC', 'QTY_TRAIN', 'VERSION'], 'integer'],
            [['ACTIVITY_DATE', 'CREATE_BY', 'CREATE_DATE', 'UPDATE_BY', 'UPDATE_DATE'], 'safe'],
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
        $query = ClnSubActivity::find();

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
            'SUB_ACTIVITY_GEN_NO' => $this->SUB_ACTIVITY_GEN_NO,
            'SPORT_GEN_NO' => $this->SPORT_GEN_NO,
            'QTY_HEALTH' => $this->QTY_HEALTH,
            'QTY_AID' => $this->QTY_AID,
            'QTY_DOC' => $this->QTY_DOC,
            'QTY_TRAIN' => $this->QTY_TRAIN,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'VERSION' => $this->VERSION,
        ]);

        $query->andFilterWhere(['like', 'ACTIVITY_DATE', $this->ACTIVITY_DATE])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY]);

        return $dataProvider;
    }
}
