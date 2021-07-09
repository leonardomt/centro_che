<?php

namespace frontend\models\Revista;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Revista\RevistaArchivo;

/**
 * RevistaArchivoSearch represents the model behind the search form of `backend\models\RevistaArchivo`.
 */
class RevistaArchivoSearch extends RevistaArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_revista_archivo', 'id_revista', 'id_archivo'], 'integer'],
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
        $query = RevistaArchivo::find();

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
            'id_revista_archivo' => $this->id_revista_archivo,
            'id_revista' => $this->id_revista,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
