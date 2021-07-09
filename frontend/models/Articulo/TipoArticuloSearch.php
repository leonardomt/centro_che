<?php

namespace frontend\models\Articulo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Articulo\TipoArticulo;

/**
 * TipoArticuloSearch represents the model behind the search form of `backend\models\TipoArticulo`.
 */
class TipoArticuloSearch extends TipoArticulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_articulo'], 'integer'],
            [['tipo_articulo'], 'safe'],
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
        $query = TipoArticulo::find();

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
            'id_tipo_articulo' => $this->id_tipo_articulo,
        ]);

        $query->andFilterWhere(['like', 'tipo_articulo', $this->tipo_articulo]);

        return $dataProvider;
    }
}
