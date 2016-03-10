<?php

namespace app\modules\news2\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\news2\models\NewsCategory;

/**
* NewsCategorySearch represents the model behind the search form about `app\modules\news2\models\NewsCategory`.
*/
class NewsCategorySearch extends NewsCategory{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'tree', 'lft', 'rgt', 'depth', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'url', 'image', 'description', 'layout'], 'safe'],
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
        $query = NewsCategory::find();

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
            'tree' => $this->tree,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'depth' => $this->depth,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'layout', $this->layout]);

        return $dataProvider;
    }

    public function trashSearch($params)
    {
        $dataProvider = $this->search($params);

        $query = $dataProvider->query;

        $query = $query->onlyRemoved();

        return $dataProvider;
    }
}