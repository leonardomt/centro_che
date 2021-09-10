<?php

namespace backend\models\Noticia;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "noticia_archivo".
 *
 * @property string $id
 * @property int $id_noticia
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class NoticiaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticia_archivo';
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
            [['id_noticia', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_noticia' => 'Noticia',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada'=> 'Portada',
        ];
    }

    public function getNoticia(){
        return $this->hasOne(Noticia::className(), ['id_noticia'=>'id_noticia']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
