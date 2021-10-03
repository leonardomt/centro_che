<?php

namespace backend\models\Exposicion;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "exposicion_archivo".
 *
 * @property string $id
 * @property int $id_exposicion
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class ExposicionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposicion_archivo';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_archivo'], 'required'],
            [['id_exposicion', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exposicion' => 'Exposición',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }

    public function getExposicion(){
        return $this->hasOne(Exposicion::className(), ['id_exposicion'=>'id_exposicion']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
