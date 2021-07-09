<?php

namespace frontend\models\Hecho;

use Yii;

/**
 * This is the model class for table "hecho".
 *
 * @property string $id_hecho
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $fecha
 */
class Hecho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hecho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'fecha'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hecho' => 'Id Hecho',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
        ];
    }
}
