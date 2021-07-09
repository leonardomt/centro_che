<?php

namespace backend\models\ProductoAudiovisual;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductoAudiovisual\ProductoAudiovisualArchivo;

/**
 * ProductoAudiovisualArchivoSearch represents the model behind the search form of `backend\models\ProductoAudiovisual\ProductoAudiovisualArchivo`.
 */
class ProductoAudiovisualArchivoSearch extends ProductoAudiovisualArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto_audiovisual_archivo', 'id_producto_audiovisual', 'id_archivo'], 'integer'],
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
        $query = ProductoAudiovisualArchivo::find();

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
            'id_producto_audiovisual_archivo' => $this->id_producto_audiovisual_archivo,
            'id_producto_audiovisual' => $this->id_producto_audiovisual,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
