<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monster;

/**
 * MonsterSearch represents the model behind the search form about `app\models\Monster`.
 */
class MonsterSearch extends Monster
{
    /**
     * @inheritdoc
     */
    public $beginAge;

    public $endAge;

    public function rules()
    {
        return [
            [['id', 'age', 'beginAge', 'endAge'], 'integer'],
            [['name', 'gender', 'username', 'password', 'skinId'], 'safe'],
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
        $query = Monster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'name',
                    'age',
                    'gender',
                    'skinId'
                ]
            ],
            'pagination' => [
                'pageSize' => 3
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'gender' => $this->gender,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['>=', 'age', $this->beginAge])
            ->andFilterWhere(['<=', 'age', $this->endAge])
            ->andFilterWhere(['in', 'skinId', $this->skinId]);

        return $dataProvider;
    }
}
