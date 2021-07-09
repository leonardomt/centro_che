<?php

namespace backend\models\Noticia;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Noticia\NoticiaArchivo;

/**
 * NoticiaArchivoSearch represents the model behind the search form of `backend\models\NoticiaArchivo`.
 */
class NoticiaArchivoSearch extends NoticiaArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_noticia_archivo', 'id_noticia', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
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
        $query = NoticiaArchivo::find();

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
            'id_noticia_archivo' => $this->id_noticia_archivo,
            'id_noticia' => $this->id_noticia,
            'id_archivo' => $this->id_archivo,
            'portada' => $this->portada,
        ]);
        $query->andFilterWhere(['like', 'nota', $this->nota]);

        return $dataProvider;
    }
}
