<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
* ProductSearch represents the model behind the search form about `common\models\Product`.
*/
class ProductSearch extends Product
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'status', 'sort', 'visit', 'sub_category_id', 'company_id'], 'integer'],
            [['image', 'price', 'created_at'], 'safe'],
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
$query = Product::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'sort' => $this->sort,
            'visit' => $this->visit,
            'sub_category_id' => $this->sub_category_id,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

return $dataProvider;
}
}