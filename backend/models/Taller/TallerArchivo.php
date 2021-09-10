<?php

namespace backend\models\Taller;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "taller_archivo".
 *
 * @property string $id
 * @property int $id_taller
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class TallerArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taller_archivo';
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
            [[ 'id_archivo'], 'required'],
            [['id_taller', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_taller' => 'Taller',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }

    public function getTaller(){
        return $this->hasOne(Taller::className(), ['id_taller'=>'id_taller']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
