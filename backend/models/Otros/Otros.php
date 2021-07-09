<?php

namespace backend\models\Otros;

use Yii;

/**
 * This is the model class for table "otros".
 *
 * @property int $id
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $autor
 * @property string $tipo
 * @property string|null $enlace
 * @property string $descripcion
 */
class Otros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'autor', 'tipo', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['descripcion'], 'string'],
            [['titulo', 'autor', 'tipo'], 'string', 'max' => 512],
            [['enlace'], 'string', 'max' => 1024],
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
            'titulo' => 'Título',
            'autor' => 'Autor',
            'tipo' => 'Tipo',
            'enlace' => 'Enlace',
            'descripcion' => 'Descripción',
        ];
    }
}
