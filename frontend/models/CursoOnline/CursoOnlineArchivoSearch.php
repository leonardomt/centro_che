<?php

namespace frontend\models\CursoOnline;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CursoOnline\CursoOnlineArchivo;

/**
 * CursoOnlineArchivoSearch represents the model behind the search form of `backend\models\CursoOnlineArchivo`.
 */
class CursoOnlineArchivoSearch extends CursoOnlineArchivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso_online_archivo', 'id_curso_online', 'id_archivo'], 'integer'],
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
        $query = CursoOnlineArchivo::find();

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
            'id_curso_online_archivo' => $this->id_curso_online_archivo,
            'id_curso_online' => $this->id_curso_online,
            'id_archivo' => $this->id_archivo,
        ]);

        return $dataProvider;
    }
}
