<?php

namespace backend\models\CursoOnline;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;
use backend\models\Archivo\Archivo;

/**
 * This is the model class for table "curso_online_archivo".
 *
 * @property string $id
 * @property int $id_curso_online
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class CursoOnlineArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso_online_archivo';
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
            [['id_curso_online',  'id_archivo' , 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso_online' => 'Curso Online',
            'id_archivo' => 'Archivo',
        ];
    }

    public function getCursoOnline(){
        return $this->hasOne(CursoOnline::className(), ['id_curso'=>'id_curso_online']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
