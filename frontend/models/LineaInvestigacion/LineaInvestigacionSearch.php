<?php

namespace frontend\models\LineaInvestigacion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LineaInvestigacion\LineaInvestigacion;

/**
 * LineaInvestigacionSearch represents the model behind the search form of `backend\models\LineaInvestigacion`.
 */
class LineaInvestigacionSearch extends LineaInvestigacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_linea_investigacion', 'revisado', 'publico'], 'integer'],
            [['nombre_linea', 'descripcion'], 'safe'],
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
        $query = LineaInvestigacion::find();

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
            'id_linea_investigacion' => $this->id_linea_investigacion,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'nombre_linea', $this->nombre_linea])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
