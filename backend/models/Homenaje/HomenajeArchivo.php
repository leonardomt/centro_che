<?php

namespace backend\models\Homenaje;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "homenaje_archivo".
 *
 * @property string $id_homenaje_archivo
 * @property int $id_homenaje
 * @property int $id_archivo
 */
class HomenajeArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homenaje_archivo';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_homenaje', 'id_archivo'], 'required'],
            [['id_homenaje', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_homenaje' => 'Homenaje',
            'id_archivo' => 'Archivo',
        ];
    }

    public function getHomenaje(){
        return $this->hasOne(Homenaje::className(), ['id_homenaje'=>'id_homenaje']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
