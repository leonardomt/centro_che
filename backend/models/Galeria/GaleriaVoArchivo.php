<?php

namespace backend\models\Galeria;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "galeria_vo_archivo".
 *
 * @property int $id
 * @property int $id_galeria_vo
 * @property int $id_archivo
 * @property string $nota
 */
class GaleriaVoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galeria_vo_archivo';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_archivo',], 'required'],
            [['id_galeria_vo', 'id_archivo'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_galeria_vo' => 'Galeria Vo',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
        ];
    }
}
