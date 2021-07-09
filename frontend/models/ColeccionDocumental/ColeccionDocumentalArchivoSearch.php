<?php

namespace frontend\models\ColeccionDocumental;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ColeccionDocumental\ColeccionDocumentalArchivo;

/**
 * ColeccionDocumentalArchivoSearch represents the model behind the search form of `backend\models\ColeccionDocumental\ColeccionDocumentalArchivo`.
 */
class ColeccionDocumentalArchivoSearch extends ColeccionDocumentalArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_coleccion_documental_archivo', 'id_coleccion_documental', 'id_archivo'], 'integer'],
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
        $query = ColeccionDocumentalArchivo::find();

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
            'id_coleccion_documental_archivo' => $this->id_coleccion_documental_archivo,
            'id_coleccion_documental' => $this->id_coleccion_documental,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}