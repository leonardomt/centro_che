<?php

namespace backend\models\Libro;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "libro_archivo".
 *
 * @property int $id
 * @property int $id_archivo
 * @property int $id_libro
 * @property string|null $nota
 * @property int|null $portada
 */
class LibroArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libro_archivo';
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
            [['id_archivo'], 'required'],
            [['id_archivo', 'id_libro', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_archivo' => 'Archivo',
            'id_libro' => 'Libro',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }
}
