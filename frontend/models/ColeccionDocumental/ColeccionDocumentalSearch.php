<?php

namespace frontend\models\ColeccionDocumental;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ColeccionDocumental\ColeccionDocumental;

/**
 * ColeccionDocumentalSearch represents the model behind the search form of `backend\models\ColeccionDocumental`.
 */
class ColeccionDocumentalSearch extends ColeccionDocumental
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_coleccion_documental', 'revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion'], 'safe'],
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
        $query = ColeccionDocumental::find();

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
            'id_coleccion_documental' => $this->id_coleccion_documental,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
