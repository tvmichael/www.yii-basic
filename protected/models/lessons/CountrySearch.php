<?php

namespace app\models\lessons;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\lessons\Country;
use yii\data\Pagination;

/**
 * CountrySearch represents the model behind the search form of `app\models\lessons\Country`.
 */
class CountrySearch extends Country
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'safe'],
            [['population', 'visited'], 'integer'],
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
        $query = Country::find();

        // add conditions that should always apply here
                                    $pagination = new Pagination([
                                        'defaultPageSize' => 5,
                                        'totalCount' => $query->count(),
                                    ]);
                                    $dataProvider = $query->orderBy('code')
                                        ->offset($pagination->offset)
                                        ->limit($pagination->limit)
                                        ->all();  


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
            'population' => $this->population,
            'visited' => $this->visited,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
