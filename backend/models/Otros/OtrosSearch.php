<?php

namespace backend\models\Otros;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Otros\Otros;

/**
 * OtrosSearch represents the model behind the search form of `backend\models\Otros\Otros`.
 */
class OtrosSearch extends Otros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'revisado', 'publico'], 'integer'],
            [['titulo', 'autor', 'tipo', 'enlace', 'descripcion'], 'safe'],
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
        $query = Otros::find();

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
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'enlace', $this->enlace])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
