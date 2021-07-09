<?php

namespace backend\models\Archivo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Archivo\TipoArchivo;

/**
 * TipoArchivoSearch represents the model behind the search form of `backend\models\TipoArchivo`.
 */
class TipoArchivoSearch extends TipoArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_archivo'], 'integer'],
            [['tipo_archivo'], 'safe'],
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
        $query = TipoArchivo::find();

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
            'id_tipo_archivo' => $this->id_tipo_archivo,
        ]);

        $query->andFilterWhere(['like', 'tipo_archivo', $this->tipo_archivo]);

        return $dataProvider;
    }
}
