<?php

namespace backend\models\Exposicion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Exposicion\Exposicion;

/**
 * ExposicionSearch represents the model behind the search form of `backend\models\Exposicion`.
 */
class ExposicionSearch extends Exposicion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exposicion', 'revisado', 'publico', 'tipo_fecha'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'enlace','fecha', 'fecha_fin','entidad', 'autor'], 'safe'],
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
        $query = Exposicion::find();

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
            'id_exposicion' => $this->id_exposicion,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'tipo_fecha' => $this->tipo_fecha,

        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'enlace', $this->enlace])
            ->andFilterWhere(['like', 'fecha_fin', $this->fecha_fin])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'entidad', $this->entidad]);

        return $dataProvider;
    }
}
