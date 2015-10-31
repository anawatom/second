<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WAPROVINCE;

/**
 * WAPROVINCESEARCH represents the model behind the search form about `app\models\WAPROVINCE`.
 */
class WAPROVINCESEARCH extends WAPROVINCE
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROVINCE_CODE', 'REGION_CODE', 'ZONE_CODE', 'PROVINCE_NAME_TH', 'PROVINCE_NAME_EN', 'CREATE_USER_ID', 'CREATE_TIME', 'LAST_UPD_USER_ID', 'LAST_UPD_TIME'], 'safe'],
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
        $query = WAPROVINCE::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'PROVINCE_CODE', $this->PROVINCE_CODE])
            ->andFilterWhere(['like', 'REGION_CODE', $this->REGION_CODE])
            ->andFilterWhere(['like', 'ZONE_CODE', $this->ZONE_CODE])
            ->andFilterWhere(['like', 'PROVINCE_NAME_TH', $this->PROVINCE_NAME_TH])
            ->andFilterWhere(['like', 'PROVINCE_NAME_EN', $this->PROVINCE_NAME_EN])
            ->andFilterWhere(['like', 'CREATE_USER_ID', $this->CREATE_USER_ID])
            ->andFilterWhere(['like', 'CREATE_TIME', $this->CREATE_TIME])
            ->andFilterWhere(['like', 'LAST_UPD_USER_ID', $this->LAST_UPD_USER_ID])
            ->andFilterWhere(['like', 'LAST_UPD_TIME', $this->LAST_UPD_TIME]);

        return $dataProvider;
    }
}
