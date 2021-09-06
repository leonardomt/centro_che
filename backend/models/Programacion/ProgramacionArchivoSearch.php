<?php

namespace backend\models\Programacion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Programacion\ProgramacionArchivo;

/**
 * ProgramacionArchivoSearch represents the model behind the search form of `backend\models\Programacion\ProgramacionArchivo`.
 */
class ProgramacionArchivoSearch extends ProgramacionArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_programacion', 'id_archivo'], 'integer'],
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
        $query = ProgramacionArchivo::find();

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
            'id_programacion' => $this->id_programacion,
            'id_archivo' => $this->id_archivo,
            'portada' => $this->portada,
        ]);

        return $dataProvider;
    }
}
