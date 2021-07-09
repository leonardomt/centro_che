<?php

namespace backend\models\CursoOnline;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CursoOnline\Clase;

/**
 * ClaseSearch represents the model behind the search form of `backend\models\CursoOnline\Clase`.
 */
class ClaseSearch extends Clase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'revisado', 'publico'], 'integer'],
            [['titulo', 'profesor', 'descripcion', 'enlace'], 'safe'],
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
        $query = Clase::find();

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
            ->andFilterWhere(['like', 'profesor', $this->profesor])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'enlace', $this->enlace]);

        return $dataProvider;
    }
}
