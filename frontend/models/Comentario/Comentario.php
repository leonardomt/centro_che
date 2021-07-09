<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id_comentario
 * @property int $publico
 * @property string $comentario
 * @property string $autor
 * @property string $correo
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comentario', 'autor', 'correo'], 'required'],
            [['publico'], 'integer'],
            [['comentario', 'autor', 'correo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comentario' => 'Id Comentario',
            'publico' => 'Publico',
            'comentario' => 'Comentario',
            'autor' => 'Autor',
            'correo' => 'Correo',
        ];
    }
}
