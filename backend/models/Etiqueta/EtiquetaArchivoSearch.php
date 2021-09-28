<?php

namespace backend\models\Etiqueta;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Etiqueta\EtiquetaArchivo;

/**
 * EtiquetaArchivoSearch represents the model behind the search form of `backend\models\Etiqueta\EtiquetaColeccionDocumental`.
 */
class EtiquetaArchivoSearch extends EtiquetaArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_etiqueta', 'id_archivo'], 'integer'],
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
        $query = EtiquetaArchivo::find();

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
            'id_etiqueta' => $this->id_etiqueta,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
