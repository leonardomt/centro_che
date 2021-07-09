<?php

namespace backend\models\GestionDocumental;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\GestionDocumental\GestionDocumental;

/**
 * GestionDocumentalSearch represents the model behind the search form of `backend\models\GestionDocumental\GestionDocumental`.
 */
class GestionDocumentalSearch extends GestionDocumental
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gestion_documental'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = GestionDocumental::find();

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
            'id_gestion_documental' => $this->id_gestion_documental,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
