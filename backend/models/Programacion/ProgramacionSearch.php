<?php

namespace backend\models\Programacion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Programacion\Programacion;

/**
 * ProductoAudiovisualSearch represents the model behind the search form of `backend\models\ProductoAudiovisual\ProductoAudiovisual`.
 */
class ProgramacionSearch extends Programacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'revisado', 'publico'], 'integer'],
            [['descripcion', 'fecha','titulo', 'lugar', 'fecha_fin', 'hora'], 'safe'],
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
        $query = Programacion::find();

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
            'id' => $this->id,
            'revisado' => $this->revisado,
            'publico' => $this->publico,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'fecha_fin', $this->fecha_fin])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'hora', $this->hora])
            ->andFilterWhere(['like', 'lugar', $this->lugar])
        ;

        return $dataProvider;
    }
}
