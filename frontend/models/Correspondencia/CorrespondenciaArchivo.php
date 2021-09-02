<?php

namespace frontend\models\Correspondencia;

use Yii;
use frontend\models\Archivo\Archivo;

/**
 * This is the model class for table "correspondencia_archivo".
 *
 * @property string $id
 * @property int $id_correspondencia
 * @property int $id_archivo
  * @property string $nota
 * @property int $portada
 */
class CorrespondenciaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correspondencia_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_archivo'], 'required'],
            [['id_correspondencia', 'id_archivo' , 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_correspondencia' => 'Correspondencia',
            'id_archivo' => 'Archivo',
        ];
    }

    public function getCorrespondencia(){
        return $this->hasOne(Correspondencia::className(), ['id_correspondencia'=>'id_correspondencia']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
