<?php

namespace frontend\models\Noticia;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Noticia\Noticia;

/**
 * NoticiaSearch represents the model behind the search form of `backend\models\Noticia`.
 */
class NoticiaSearch extends Noticia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_noticia', 'revisado', 'publico'], 'integer'],
            [['titulo_noticia', 'fecha', 'referencia', 'descripcion'], 'safe'],
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
        $query = Noticia::find();

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
            'id_noticia' => $this->id_noticia,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo_noticia', $this->titulo_noticia])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
