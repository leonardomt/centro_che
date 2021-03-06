<?php

namespace backend\models\Comentario;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comentario\Comentario;

/**
 * ComentarioSearch represents the model behind the search form of `backend\models\Comentario\Comentario`.
 */
class ComentarioSearch extends Comentario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'id_tabla', 'publico', 'revisado', 'respuesta'], 'integer'],
            [['fecha','tabla', 'alias', 'correo', 'comentario', 'seccion'], 'safe'],
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
        $query = Comentario::find();

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
            'id_tabla' => $this->id_tabla,
            'publico' => $this->publico,
            'revisado' => $this->revisado,
            'respuesta' => $this->respuesta,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'tabla', $this->tabla])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'seccion', $this->seccion])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
