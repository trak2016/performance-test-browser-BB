<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;

/**
 * CategorySearch represents the model behind the search form about `common\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'manner', 'status', 'orderlist', 'parent_id'], 'integer'],
            [['cat_name', 'description', 'avatarlink'], 'safe'],
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
        $query = Category::find();

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
            'cat_id' => $this->cat_id,
            'manner' => $this->manner,
            'status' => $this->status,
            'orderlist' => $this->orderlist,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'cat_name', $this->cat_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'avatarlink', $this->avatarlink]);

        return $dataProvider;
    }
}
