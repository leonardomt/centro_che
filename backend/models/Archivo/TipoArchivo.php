<?php

namespace backend\models\Archivo;

use Yii;

/**
 * This is the model class for table "tipo_archivo".
 *
 * @property string $id_tipo_archivo
 * @property string $tipo_archivo
 */
class TipoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_archivo'], 'required'],
            [['tipo_archivo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_arichivo' => 'Tipo de Archivo',
            'tipo_archivo' => 'Tipo de Archivo',
        ];
    }
}
