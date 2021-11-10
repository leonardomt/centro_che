<?php

namespace backend\models\Hecho;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hecho\Hecho;

/**
 * HechoSearch represents the model behind the search form of `backend\models\Hecho`.
 */
class HechoSearch extends Hecho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hecho', 'revisado', 'publico', 'tipo_fecha'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'fecha', 'fecha_fin','etapa'], 'safe'],
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
        $query = Hecho::find();

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
            'id_hecho' => $this->id_hecho,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'tipo_fecha' => $this->tipo_fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'fecha_fin', $this->fecha_fin])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'etapa', $this->etapa]);

        return $dataProvider;
    }
}
