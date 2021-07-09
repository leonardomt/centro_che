<?php

namespace frontend\models\Homenaje;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Homenaje\Homenaje;

/**
 * HomenajeSearch represents the model behind the search form of `backend\models\Homenaje`.
 */
class HomenajeSearch extends Homenaje
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_homenaje', 'revisado', 'publico', 'id_tipo_homenaje'], 'integer'],
            [['titulo', 'descripcion'], 'safe'],
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
        $query = Homenaje::find();

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
            'id_homenaje' => $this->id_homenaje,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'id_tipo_homenaje' => $this->id_tipo_homenaje,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
