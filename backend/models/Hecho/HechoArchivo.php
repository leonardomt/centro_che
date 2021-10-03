<?php

namespace backend\models\Hecho;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "hecho_archivo".
 *
 * @property string $id
 * @property int $id_hecho
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class HechoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hecho_archivo';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_archivo'], 'required'],
            [['id_hecho', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hecho' => 'Hecho',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada'=> 'Portada',
        ];
    }

    public function getHecho(){
        return $this->hasOne(Hecho::className(), ['id_hecho'=>'id_hecho']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
