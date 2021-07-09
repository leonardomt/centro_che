<?php

namespace backend\models\Revista;

use Yii;

/**
 * This is the model class for table "revista".
 *
 * @property string $id_revista
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $enlace
 * @property string $fecha
 * @property string $volumen
 * @property string $numero
 */
class Revista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'enlace', 'fecha', 'volumen', 'numero'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion', 'enlace', 'volumen', 'numero'], 'string'],
            [['titulo'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_revista' => 'Revista',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'enlace' => 'Enlace',
            'fecha' => 'Fecha',
            'numero' => 'Año',
            'volumen' => 'Volumen',
        ];
    }
}
