<?php

namespace backend\models\Proyecto;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Proyecto\Proyecto;

/**
 * ProyectoSearch represents the model behind the search form of `backend\models\Proyecto\Proyecto`.
 */
class ProyectoSearch extends Proyecto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proyecto'], 'integer'],
            [['descripcion', 'enlace'], 'safe'],
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
        $query = Proyecto::find();

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
            'id_proyecto' => $this->id_proyecto,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'enlace', $this->enlace]);

        return $dataProvider;
    }
}
