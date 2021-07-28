<?php

namespace backend\models\Escrito;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Escrito\EscritoArchivo;

/**
 * EscritoArchivoSearch represents the model behind the search form of `backend\models\Escrito\EscritoArchivo`.
 */
class EscritoArchivoSearch extends EscritoArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_escrito', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'safe'],
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
        $query = EscritoArchivo::find();

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
            'id_escrito' => $this->id_escrito,
            'id_archivo' => $this->id_archivo,
            'portada' => $this->portada,
        ]);

        $query->andFilterWhere(['like', 'nota', $this->nota]);

        return $dataProvider;
    }
}
