<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CoaGrouping;

/**
 * CoaGroupingSearch represents the model behind the search form of `common\models\CoaGrouping`.
 */
class CoaGroupingSearch extends CoaGrouping
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'create_user', 'update_user'], 'integer'],
            [['group_name', 'create_time', 'update_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CoaGrouping::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'create_user' => $this->create_user,
            'create_time' => $this->create_time,
            'update_user' => $this->update_user,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name]);

        return $dataProvider;
    }
}
