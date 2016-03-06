<?php

namespace app\modules\news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\news\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\modules\news\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'date_public', 'created_at', 'created_by', 'updated_at', 'updated_by', 'removed', 'locked'], 'integer'],
            [['name', 'url', 'image', 'annotation', 'content', 'layout'], 'safe'],
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
        $query = News::find();

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
            'category_id' => $this->category_id,
            'date_public' => $this->date_public,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'removed' => $this->removed,
            'locked' => $this->locked,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'annotation', $this->annotation])
            ->andFilterWhere(['like', 'content', $this->content])
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
