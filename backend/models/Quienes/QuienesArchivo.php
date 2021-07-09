<?php

namespace backend\models\Quienes;

use Yii;

/**
 * This is the model class for table "quienes_archivo".
 *
 * @property int $id
 * @property string $url
 * @property string|null $extra
 */
class QuienesArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'quienes_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
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
            'file' => '',
        ];
    }
}
