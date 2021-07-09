<?php

namespace frontend\models\Revista;

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
            [['revisado', 'publico', 'titulo', 'descripcion', 'enlace'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['descripcion', 'enlace'], 'string'],
            [['titulo'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_revista' => 'Id Revista',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'enlace' => 'Enlace',
        ];
    }
}
