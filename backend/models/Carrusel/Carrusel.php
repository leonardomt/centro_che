<?php

namespace backend\models\Carrusel;

use Yii;

/**
 * This is the model class for table "carrusel".
 *
 * @property int $id
 * @property string $url
 * @property string|null $extra
 */
class Carrusel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'carrusel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'file'], 'required'],
            [['url', 'extra'], 'string'],
            [
                ['file'], 'file',
                'on' => 'create',
                'extensions' => 'jpg, jpeg, png',
                'wrongExtension' => 'El archivo {file} no tiene una extensión permitida ( {extensions} )',
                'tooBig' => 'El archivo sobrepasa el tamaño máximo permitido ',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Imagen',
            'extra' => 'Extra',
            'file' => 'Archivo',
        ];
    }
}
