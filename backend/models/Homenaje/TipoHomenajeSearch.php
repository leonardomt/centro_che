<?php

namespace backend\models\Homenaje;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Homenaje\TipoHomenaje;

/**
 * TipoHomenajeSearch represents the model behind the search form of `backend\models\TipoHomenaje`.
 */
class TipoHomenajeSearch extends TipoHomenaje
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_homenaje'], 'integer'],
            [['tipo_homenaje'], 'safe'],
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
        $query = TipoHomenaje::find();

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
            'id_tipo_homenaje' => $this->id_tipo_homenaje,
        ]);

        $query->andFilterWhere(['like', 'tipo_homenaje', $this->tipo_homenaje]);

        return $dataProvider;
    }
}
