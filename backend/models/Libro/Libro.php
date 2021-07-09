<?php

namespace backend\models\Libro;

use Yii;

/**
 * This is the model class for table "libro".
 *
 * @property int $id
 * @property int $revisado
 * @property int $publico
 * @property string $fecha
 * @property string $titulo
 * @property string $autor
 * @property string $compilador
 * @property string $linea
 * @property string $palabras_clave
 * @property string $descripcion
 */
class Libro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'fecha', 'titulo', 'autor', 'compilador', 'linea', 'palabras_clave', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string'],
            [['titulo', 'autor', 'compilador', 'palabras_clave'], 'string', 'max' => 512],
            [['linea'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'fecha' => 'Fecha',
            'titulo' => 'Título',
            'autor' => 'Autor',
            'compilador' => 'Compilador',
            'linea' => 'Línea Temática',
            'palabras_clave' => 'Palabras Clave',
            'descripcion' => 'Descripción',
        ];
    }
}
