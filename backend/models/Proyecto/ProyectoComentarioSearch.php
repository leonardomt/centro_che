<?php

namespace backend\models\Proyecto;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Proyecto\ProyectoComentario;

/**
 * ProyectoComentarioSearch represents the model behind the search form of `backend\models\Proyecto\ProyectoComentario`.
 */
class ProyectoComentarioSearch extends ProyectoComentario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proyecto_comentario', 'revisado', 'publico', 'id_proyecto'], 'integer'],
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
        $query = ProyectoComentario::find();

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
            'id_proyecto_comentario' => $this->id_proyecto_comentario,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
            'id_proyecto' => $this->id_proyecto,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
