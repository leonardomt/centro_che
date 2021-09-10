<?php

namespace backend\models\Quienes;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "quienes_detalle_archivo".
 *
 * @property int $id
 * @property string $url
 */
class QuienesDetalleArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'quienes_detalle_archivo';
    }

    public function behaviors(){
        return [

            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::className()
            ],

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'url' => 'Imagen',
            'file' => 'Archivo',
        ];
    }
}
