<?php

namespace backend\models\Noticia;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Noticia\NoticiaComentario;

/**
 * NoticiaComentarioSearch represents the model behind the search form of `backend\models\Noticia\NoticiaComentario`.
 */
class NoticiaComentarioSearch extends NoticiaComentario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_noticia_comentario', 'revisado', 'publico', 'id_noticia'], 'integer'],
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
        $query = NoticiaComentario::find();

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
            'id_noticia_comentario' => $this->id_noticia_comentario,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
            'id_noticia' => $this->id_noticia,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
