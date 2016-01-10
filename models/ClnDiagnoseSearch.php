<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClnDiagnose;

/**
 * ClnDiagnoseSearch represents the model behind the search form about `app\models\ClnDiagnose`.
 */
class ClnDiagnoseSearch extends ClnDiagnose
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DIAGNOSE_GEN_NO', 'TRAN_INJ_GEN_NO', 'SPORT_GEN_NO', 'BOND_GEN_NO', 'CAUSE_GEN_NO', 'VERSION'], 'integer'],
            [['DIAGNOSE_TYPE', 'CAUSE_OTHER', 'DIAGNOSE', 'DOCTOR_NAME', 'UPDATE_BY', 'UPDATE_DATE', 'CREATE_BY', 'CREATE_DATE'], 'safe'],
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
        $query = ClnDiagnose::find();

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
            'DIAGNOSE_GEN_NO' => $this->DIAGNOSE_GEN_NO,
            'TRAN_INJ_GEN_NO' => $this->TRAN_INJ_GEN_NO,
            'SPORT_GEN_NO' => $this->SPORT_GEN_NO,
            'BOND_GEN_NO' => $this->BOND_GEN_NO,
            'CAUSE_GEN_NO' => $this->CAUSE_GEN_NO,
            'VERSION' => $this->VERSION,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'CREATE_DATE' => $this->CREATE_DATE,
        ]);

        $query->andFilterWhere(['like', 'DIAGNOSE_TYPE', $this->DIAGNOSE_TYPE])
            ->andFilterWhere(['like', 'CAUSE_OTHER', $this->CAUSE_OTHER])
            ->andFilterWhere(['like', 'DIAGNOSE', $this->DIAGNOSE])
            ->andFilterWhere(['like', 'DOCTOR_NAME', $this->DOCTOR_NAME])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY]);

        return $dataProvider;
    }
}
