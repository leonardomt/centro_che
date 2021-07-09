<?php

namespace frontend\models\CursoOnline;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CursoOnline\CursoOnline;

/**
 * CursoOnlineSearch represents the model behind the search form of `backend\models\CursoOnline`.
 */
class CursoOnlineSearch extends CursoOnline
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso', 'revisado', 'publico'], 'integer'],
            [['contacto', 'titulo', 'descripcion'], 'safe'],
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
        $query = CursoOnline::find();

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
            'id_curso' => $this->id_curso,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'contacto', $this->contacto])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
