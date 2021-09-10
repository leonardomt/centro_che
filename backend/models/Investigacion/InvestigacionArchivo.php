<?php

namespace backend\models\Investigacion;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "investigacion_archivo".
 *
 * @property string $id
 * @property int $id_investigacion
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class InvestigacionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investigacion_archivo';
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
            [['id_investigacion', 'id_archivo', 'portada'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_investigacion' => 'Investigación',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }

    public function getInvestigacion(){
        return $this->hasOne(Investigacion::className(), ['id_investigacion'=>'id_investigacion']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
