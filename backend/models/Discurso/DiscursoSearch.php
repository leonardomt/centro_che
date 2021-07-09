<?php

namespace backend\models\Discurso;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Discurso\Discurso;

/**
 * DiscursoSearch represents the model behind the search form of `backend\models\Discurso\Discurso`.
 */
class DiscursoSearch extends Discurso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_discurso', 'revisado', 'publico'], 'integer'],
            [['titulo', 'fecha', 'descripcion', 'lugar', 'medio', 'entrevistador', 'cuerpo'], 'safe'],
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
        $query = Discurso::find();

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
            'id_discurso' => $this->id_discurso,
            'fecha' => $this->fecha,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'lugar', $this->lugar])
            ->andFilterWhere(['like', 'medio', $this->medio])
            ->andFilterWhere(['like', 'entrevistador', $this->entrevistador])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
