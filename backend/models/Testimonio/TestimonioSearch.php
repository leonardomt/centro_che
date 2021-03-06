<?php

namespace backend\models\Testimonio;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Testimonio\Testimonio;

/**
 * TestimonioSearch represents the model behind the search form of `backend\models\Testimonio\Testimonio`.
 */
class TestimonioSearch extends Testimonio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_testimonio', 'revisado', 'publico'], 'integer'],
            [['titulo', 'autor', 'fecha', 'descripcion', 'cuerpo'], 'safe'],
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
        $query = Testimonio::find();

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
            'id_testimonio' => $this->id_testimonio,
            'fecha' => $this->fecha,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
