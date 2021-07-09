<?php

namespace backend\models\Revista;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Revista\Revista;

/**
 * RevistaSearch represents the model behind the search form of `backend\models\Revista\Revista`.
 */
class RevistaSearch extends Revista
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_revista', 'revisado', 'publico', 'numero'], 'integer'],
            [['titulo', 'descripcion', 'enlace', 'fecha', 'volumen'], 'safe'],
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
        $query = Revista::find();

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
            'id_revista' => $this->id_revista,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
            'numero' => $this->numero,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'enlace', $this->enlace])
            ->andFilterWhere(['like', 'volumen', $this->volumen]);

        return $dataProvider;
    }
}
