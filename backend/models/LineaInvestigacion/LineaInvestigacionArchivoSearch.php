<?php

namespace backend\models\LineaInvestigacion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LineaInvestigacion\LineaInvestigacionArchivo;

/**
 * LineaInvestigacionArchivoSearch represents the model behind the search form of `backend\models\LineaInvestigacionArchivo`.
 */
class LineaInvestigacionArchivoSearch extends LineaInvestigacionArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_linea_investigacion_archivo', 'id_linea_investigacion', 'id_archivo'], 'integer'],
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
        $query = LineaInvestigacionArchivo::find();

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
            'id_linea_investigacion_archivo' => $this->id_linea_investigacion_archivo,
            'id_linea_investigacion' => $this->id_linea_investigacion,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
