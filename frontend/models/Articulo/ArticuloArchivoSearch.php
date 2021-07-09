<?php

namespace frontend\models\Articulo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Articulo\ArticuloArchivo;

/**
 * ArticuloArchivoSearch represents the model behind the search form of `backend\models\ArticuloArchivo`.
 */
class ArticuloArchivoSearch extends ArticuloArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_articulo_archivo', 'id_articulo', 'id_archivo'], 'integer'],
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
        $query = ArticuloArchivo::find();

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
            'id_articulo_archivo' => $this->id_articulo_archivo,
            'id_articulo' => $this->id_articulo,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
