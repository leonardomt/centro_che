<?php

namespace backend\models\Articulo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Articulo\Articulo;

/**
 * ArticuloSearch represents the model behind the search form of `backend\models\Articulo`.
 */
class ArticuloSearch extends Articulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_articulo', 'revisado', 'publico'], 'integer'],
            [['titulo', 'autor', 'fecha', 'resumen', 'cuerpo'], 'safe'],
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
        $query = Articulo::find();

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
            'id_articulo' => $this->id_articulo,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
