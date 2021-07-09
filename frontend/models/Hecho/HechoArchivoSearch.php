<?php

namespace frontend\models\Hecho;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Hecho\HechoArchivo;

/**
 * HechoArchivoSearch represents the model behind the search form of `backend\models\HechoArchivo`.
 */
class HechoArchivoSearch extends HechoArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hecho_archivo', 'id_hecho', 'id_archivo'], 'integer'],
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
        $query = HechoArchivo::find();

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
            'id_hecho_archivo' => $this->id_hecho_archivo,
            'id_hecho' => $this->id_hecho,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
