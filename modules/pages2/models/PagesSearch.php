<?php

namespace app\modules\pages2\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pages2\models\Pages;

/**
* PagesSearch represents the model behind the search form about `app\modules\pages2\models\Pages`.
*/
class PagesSearch extends Pages{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'removed', 'status', 'locked'], 'integer'],
            [['name', 'url', 'content', 'layout'], 'safe'],
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
        $query = Pages::find();

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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'removed' => $this->removed,
            'status' => $this->status,
            'locked' => $this->locked,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'layout', $this->layout]);

        return $dataProvider;
    }
}