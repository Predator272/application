<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Photo;

/**
 * PhotoSearch represents the model behind the search form of `app\models\Photo`.
 */
class PhotoSearch extends Photo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'likes'], 'integer'],
            [['time', 'name', 'data'], 'safe'],
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
        $query = Photo::find();

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
            'idUser' => $this->idUser,
            'time' => $this->time,
            'likes' => $this->likes,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}