<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\About;

/**
* AboutSearch represents the model behind the search form about `common\models\About`.
*/
class AboutSearch extends About
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
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
$query = About::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {

return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
        ]);

return $dataProvider;
}
}