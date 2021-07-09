<?php

namespace backend\models\Galeria;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Galeria\GaleriaVo;

/**
 * GaleriaVOSearch represents the model behind the search form of `backend\models\Galeria\GaleriaVO`.
 */
class GaleriaVoSearch extends GaleriaVo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_galeria_vo', 'publico'], 'integer'],
            [['tipo', 'genero', 'nota'], 'safe'],
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
        $query = GaleriaVo::find();

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
            'id_galeria_vo' => $this->id_galeria_vo,
            'tipo' => $this->tipo,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'nota', $this->nota])
            ->andFilterWhere(['like', 'id_archivo', $this->id_archivo]);


        return $dataProvider;
    }
}
