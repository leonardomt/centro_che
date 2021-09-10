<?php

namespace backend\models\LineaInvestigacion;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "linea_investigacion_archivo".
 *
 * @property string $id_linea_investigacion_archivo
 * @property int $id_linea_investigacion
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class LineaInvestigacionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linea_investigacion_archivo';
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
            [['id_linea_investigacion', 'id_archivo', 'portada'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_linea_investigacion_archivo' => 'Id Linea Investigacion Archivo',
            'id_linea_investigacion' => 'Línea de Investigación',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];


    }



    public function getLineaInvestigacion(){
        return $this->hasOne(LineaInvestigacion::className(), ['id_linea_investigacion'=>'id_linea_investigacion']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
