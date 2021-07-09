<?php

namespace backend\models\Proyecto;

use Yii;

/**
 * This is the model class for table "proyecto_archivo".
 *
 * @property int $id
 * @property int $id_archivo
 * @property int $id_proyecto
 */
class ProyectoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'proyecto_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['url'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'url' => ' ',
        ];
    }
}
