<?php

namespace backend\models\Archivo;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Archivo\Archivo;

/**
 * ArchivoSearch represents the model behind the search form of `backend\models\Archivo`.
 */
class ArchivoSearch extends Archivo
{
    /**
     * {@inheritdoc}
     */
    public $created_at_c; //start time
    public $created_at_e; //End time
    public function rules()
    {
        return [
            [['id_archivo', 'revisado', 'tipo_archivo'], 'integer'],
            [['titulo_archivo', 'fecha', 'created_at_c', 'etapa', 'created_at_e',  'autor_archivo', 'etiqueta', 'fuente', 'descripcion_archivo', 'url_archivo'], 'safe'],
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
        $query = Archivo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        // grid filtering conditions
        $query->andFilterWhere([
            'id_archivo' => $this->id_archivo,
            'revisado' => $this->revisado,
            'tipo_archivo' => $this->tipo_archivo,
        ]);

        $query->andFilterWhere(['like', 'titulo_archivo', $this->titulo_archivo])
            ->andFilterWhere(['like', 'autor_archivo', $this->autor_archivo])
            ->andFilterWhere(['like', 'etiqueta', $this->etiqueta])
            ->andFilterWhere(['like', 'fuente', $this->fuente])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'etapa', $this->etapa])
            ->andFilterWhere(['like', 'descripcion_archivo', $this->descripcion_archivo])
            ->andFilterWhere(['like', 'url_archivo', $this->url_archivo]);





        return $dataProvider;
    }
}
