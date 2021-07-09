<?php

namespace backend\models\Testimonio;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Testimonio\TestimonioArchivo;

/**
 * TestimonioArchivoSearch represents the model behind the search form of `backend\models\Testimonio\TestimonioArchivo`.
 */
class TestimonioArchivoSearch extends TestimonioArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_testimonio', 'id_archivo', 'portada'], 'integer'],
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
        $query = TestimonioArchivo::find();

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
            'id_testimonio' => $this->id_testimonio,
            'id_archivo' => $this->id_archivo,
            'portada' => $this->portada,
        ]);

        $query->andFilterWhere(['like', 'nota', $this->nota]);

        return $dataProvider;
    }
}
