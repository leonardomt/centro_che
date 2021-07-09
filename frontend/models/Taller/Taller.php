<?php

namespace frontend\models\Taller;

use Yii;

/**
 * This is the model class for table "taller".
 *
 * @property string $id_taller
 * @property int $publico
 * @property string $nombre
 * @property string $descripcion
 * @property string $contacto
 * @property string $encargado
 */
class Taller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publico', 'nombre', 'descripcion', 'contacto', 'encargado'], 'required'],
            [['publico'], 'integer'],
            [['nombre', 'descripcion', 'contacto', 'encargado'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_taller' => 'Id Taller',
            'publico' => 'Publico',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'contacto' => 'Contacto',
            'encargado' => 'Encargado',
        ];
    }
}
