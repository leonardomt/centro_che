<?php

namespace backend\models\ProductoAudiovisual;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductoAudiovisual\ProductoAudiovisual;

/**
 * ProductoAudiovisualSearch represents the model behind the search form of `backend\models\ProductoAudiovisual\ProductoAudiovisual`.
 */
class ProductoAudiovisualSearch extends ProductoAudiovisual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto_audiovisual', 'revisado', 'publico','tipo'], 'integer'],
            [['descripcion', 'cuerpo','titulo', 'autor', 'productora'], 'safe'],
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
        $query = ProductoAudiovisual::find();

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
            'id_producto_audiovisual' => $this->id_producto_audiovisual,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'tipo'=> $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'productora', $this->productora])
        ;

        return $dataProvider;
    }
}
