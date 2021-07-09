<?php

namespace backend\models\Taller;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Taller\TallerArchivo;

/**
 * TallerArchivoSearch represents the model behind the search form of `backend\models\TallerArchivo`.
 */
class TallerArchivoSearch extends TallerArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_taller_archivo', 'id_taller', 'id_archivo'], 'integer'],
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
        $query = TallerArchivo::find();

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
            'id_taller_archivo' => $this->id_taller_archivo,
            'id_taller' => $this->id_taller,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
