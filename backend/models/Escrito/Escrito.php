<?php

namespace backend\models\Escrito;

use Yii;

/**
 * This is the model class for table "escrito".
 *
 * @property int $id_escrito
 * @property string $tipo
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 */
class Escrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escrito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'titulo', 'descripcion', 'cuerpo', 'revisado', 'publico'], 'required'],
            [['titulo', 'descripcion', 'cuerpo'], 'string'],
            [['revisado', 'publico'], 'integer'],
            [['tipo'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_escrito' => 'Id Escrito',
            'tipo' => 'Tipo',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'cuerpo' => 'Contenido',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
        ];
    }
}
