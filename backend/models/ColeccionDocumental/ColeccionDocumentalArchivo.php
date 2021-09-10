<?php

namespace backend\models\ColeccionDocumental;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "coleccion_documental_archivo".
 *
 * @property string $id
 * @property int $id_coleccion_documental
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class ColeccionDocumentalArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental_archivo';
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
            [['id_coleccion_documental', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_coleccion_documental_archivo' => 'Id Coleccion Documental Archivo',
            'id_coleccion_documental' => 'Colección Documental',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }
}
