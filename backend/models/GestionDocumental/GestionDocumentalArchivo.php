<?php

namespace backend\models\GestionDocumental;

use Yii;

/**
 * This is the model class for table "gestion_documental_archivo".
 *
 * @property int $id
 * @property string $url
 */
class GestionDocumentalArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'gestion_documental_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['url'], 'string'],
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
            'url' => '',
            'file' => '',
        ];
    }
}
