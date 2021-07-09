<?php

namespace backend\models\Discurso;

use Yii;

/**
 * This is the model class for table "discurso".
 *
 * @property int $id_discurso
 * @property string $titulo
 * @property string $fecha
 * @property string $descripcion
 * @property string $lugar
 * @property string $medio
 * @property string $entrevistador
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 */
class Discurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'fecha', 'descripcion', 'lugar', 'medio', 'entrevistador', 'cuerpo', 'revisado', 'publico'], 'required'],
            [['titulo', 'descripcion', 'lugar', 'entrevistador', 'cuerpo'], 'string'],
            [['fecha'], 'safe'],
            [['revisado', 'publico'], 'integer'],
            [['medio'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_discurso' => 'Id Discurso',
            'titulo' => 'Titulo',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'lugar' => 'Lugar',
            'medio' => 'Medio',
            'entrevistador' => 'Entrevistador',
            'cuerpo' => 'Cuerpo',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
        ];
    }
}
