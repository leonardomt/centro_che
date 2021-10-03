<?php

namespace backend\models\Programacion;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "programacion_archivo".
 *
 * @property int $id
 * @property int $id_programacion
 * @property int $id_archivo
 * @property int $portada
 */
class ProgramacionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programacion_archivo';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_archivo'], 'required'],
            [['id_programacion', 'id_archivo', 'portada'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Programación Archivo',
            'id_programacion' => 'Programación Cultural',
            'id_archivo' => 'Archivo',
            'portada' => 'Portada',
        ];
    }
}
