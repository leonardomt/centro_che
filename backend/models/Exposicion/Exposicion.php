<?php

namespace backend\models\Exposicion;

use Yii;

/**
 * This is the model class for table "exposicion".
 *
 * @property string $id_exposicion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $enlace
 * @property string $entidad
 * @property string $autor
 * @property int $tipo_fecha
 * @property string $fecha
 * @property string $fecha_fin
 */
class Exposicion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposicion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'cuerpo', 'enlace', 'tipo_fecha', 'fecha', 'entidad', 'autor'], 'required'],
            [['revisado', 'publico', 'tipo_fecha'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'entidad', 'autor'], 'string'],
            [['enlace'], 'string', 'max' => 512],
            [['fecha', 'fecha_fin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exposicion' => 'Exposición',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'enlace' => 'Enlace',
            'tipo_fecha' => 'Tipo de Fecha',
            'fecha' => 'Fecha',
            'fecha_fin' => 'Fecha final',
            'entidad'=> 'Entidad Colaboradora',
            'autor'=> 'Autor',
        ];
    }
}
