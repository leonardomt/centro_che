<?php

namespace frontend\models\Articulo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Articulo\ArticuloComentario;

/**
 * ArticuloComentarioSearch represents the model behind the search form of `backend\models\Articulo\ArticuloComentario`.
 */
class ArticuloComentarioSearch extends ArticuloComentario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_articulo_comentario', 'revisado', 'publico', 'id_articulo'], 'integer'],
            [['autor', 'fecha', 'comentario'], 'safe'],
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
        $query = ArticuloComentario::find();

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
            'id_articulo_comentario' => $this->id_articulo_comentario,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
            'id_articulo' => $this->id_articulo,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
