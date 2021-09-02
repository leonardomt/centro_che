<?php

namespace frontend\models\Correspondencia;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Correspondencia\Correspondencia;

/**
 * CorrespondenciaSearch represents the model behind the search form of `backend\models\Correspondencia`.
 */
class CorrespondenciaSearch extends Correspondencia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_correspondencia', 'revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'destinatario', 'remitente', 'fecha'], 'safe'],
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
        $query = Correspondencia::find();

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
            'id_correspondencia' => $this->id_correspondencia,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'destinatario', $this->destinatario])
            ->andFilterWhere(['like', 'remitente', $this->remitente]);

        return $dataProvider;
    }
}
