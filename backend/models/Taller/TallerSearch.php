<?php

namespace backend\models\Taller;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Taller\Taller;

/**
 * TallerSearch represents the model behind the search form of `backend\models\Taller`.
 */
class TallerSearch extends Taller
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_taller', 'publico','revisado'], 'integer'],
            [['nombre', 'descripcion', 'contacto', 'encargado','tipo'], 'safe'],
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
        $query = Taller::find();

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
            'id_taller' => $this->id_taller,
            'publico' => $this->publico,
            'revisado' => $this->revisado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'contacto', $this->contacto])
            ->andFilterWhere(['like', 'encargado', $this->encargado])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
