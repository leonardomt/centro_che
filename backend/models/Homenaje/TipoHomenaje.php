<?php

namespace backend\models\Homenaje;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "tipo_homenaje".
 *
 * @property string $id_tipo_homenaje
 * @property string $tipo_homenaje
 */
class TipoHomenaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_homenaje';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_homenaje'], 'required'],
            [['tipo_homenaje'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_homenaje' => 'Id Tipo Homenaje',
            'tipo_homenaje' => 'Tipo de Homenaje',
        ];
    }
}
