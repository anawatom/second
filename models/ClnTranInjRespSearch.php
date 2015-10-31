<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnTranInjResp;

/**
 * ClnTranInjRespSearch represents the model behind the search form about `app\models\ClnTranInjResp`.
 */
class ClnTranInjRespSearch extends ClnTranInjResp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRAN_INJ_RESP_ID', 'STAFF_ID', 'TRAN_INJ_GEN_NO'], 'integer'],
            [['CREATE_BY', 'CREATE_DATE'], 'safe'],
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
        $query = ClnTranInjResp::find();

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
            'TRAN_INJ_RESP_ID' => $this->TRAN_INJ_RESP_ID,
            'STAFF_ID' => $this->STAFF_ID,
            'TRAN_INJ_GEN_NO' => $this->TRAN_INJ_GEN_NO,
        ]);

        $query->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'CREATE_DATE', $this->CREATE_DATE]);

        return $dataProvider;
    }
}
