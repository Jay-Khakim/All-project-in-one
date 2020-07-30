<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BannerPagePosition;

/**
* BannerPagePositionSearch represents the model behind the search form about `common\models\BannerPagePosition`.
*/
class BannerPagePositionSearch extends BannerPagePosition
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'status', 'sort', 'page_id', 'position_id', 'banner_id'], 'integer'],
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
$query = BannerPagePosition::find();

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
            'page_id' => $this->page_id,
            'position_id' => $this->position_id,
            'banner_id' => $this->banner_id,
        ]);

return $dataProvider;
}
}