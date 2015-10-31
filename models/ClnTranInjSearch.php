<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnTranInj;

/**
 * ClnTranInjSearch represents the model behind the search form about `app\models\ClnTranInj`.
 */
class ClnTranInjSearch extends ClnTranInj
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRAN_INJ_GEN_NO', 'REGISTER_GEN_NO', 'VERSION'], 'integer'],
            [['TRAN_INJ_DATE', 'UPDATE_BY', 'UPDATE_DATE', 'CREATE_DATE', 'CREATE_BY'], 'safe'],
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
        $query = ClnTranInj::find();

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
            'TRAN_INJ_GEN_NO' => $this->TRAN_INJ_GEN_NO,
            'REGISTER_GEN_NO' => $this->REGISTER_GEN_NO,
            'VERSION' => $this->VERSION,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'CREATE_DATE' => $this->CREATE_DATE,
        ]);

        $query->andFilterWhere(['like', 'TRAN_INJ_DATE', $this->TRAN_INJ_DATE])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY]);

        return $dataProvider;
    }
}
