<?php

namespace frontend\models\Investigacion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Investigacion\Investigacion;

/**
 * InvestigacionSearch represents the model behind the search form of `backend\models\Investigacion`.
 */
class InvestigacionSearch extends Investigacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_investigacion', 'revisado', 'publico', 'id_linea_investigacion'], 'integer'],
            [['titulo_investigacion', 'descripcion', 'autor'], 'safe'],
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
        $query = Investigacion::find();

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
            'id_investigacion' => $this->id_investigacion,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'id_linea_investigacion' => $this->id_linea_investigacion,
        ]);

        $query->andFilterWhere(['like', 'titulo_investigacion', $this->titulo_investigacion])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'autor', $this->autor]);

        return $dataProvider;
    }
}
