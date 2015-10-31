<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WA_ZONE;
use \DateTime;
/**
 * WA_ZONE_SEARCH represents the model behind the search form about `app\models\WA_ZONE`.
 */
class WA_ZONE_SEARCH extends WA_ZONE
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ZONE_CODE', 'ZONE_NAME_TH', 'ZONE_NAME_EN', 'CREATE_USER_ID', 'CREATE_TIME', 'LAST_UPD_USER_ID', 'LAST_UPD_TIME'], 'safe'],
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
        $query = WA_ZONE::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->CREATE_TIME) {
            $date = Yii::$app->utilsHelper->convThFormatDate($this->CREATE_TIME,'dd MM yyyy','dd/mm/yyyy');
            $query->andFilterWhere(['between','CREATE_TIME',  new \yii\db\Expression("to_date('$date 00:00:01','dd/mm/yyyy hh24:mi:ss')") , new \yii\db\Expression("to_date('$date 23:59:59','dd/mm/yyyy hh24:mi:ss')")] ) ; 
        }
        
      
        $query->andFilterWhere(['like', 'ZONE_CODE', $this->ZONE_CODE])
            ->andFilterWhere(['like', 'ZONE_NAME_TH', $this->ZONE_NAME_TH])
            ->andFilterWhere(['like', 'ZONE_NAME_EN', $this->ZONE_NAME_EN])
            ->andFilterWhere(['like', 'CREATE_USER_ID', $this->CREATE_USER_ID])
            ->andFilterWhere(['like', 'LAST_UPD_USER_ID', $this->LAST_UPD_USER_ID]);

        return $dataProvider;
    }
}
