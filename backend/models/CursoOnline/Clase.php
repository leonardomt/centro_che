<?php

namespace backend\models\CursoOnline;

use Yii;

/**
 * This is the model class for table "clase".
 *
 * @property int $id
 * @property string $titulo
 * @property string $profesor
 * @property string $descripcion
 * @property string $enlace
 * @property int $revisado
 * @property int $publico
 */
class Clase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'profesor', 'descripcion', 'enlace'], 'required'],
            [['descripcion', 'enlace'], 'string'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'profesor'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'profesor' => 'Profesor',
            'descripcion' => 'Descripcion',
            'enlace' => 'Enlace',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
        ];
    }
}
