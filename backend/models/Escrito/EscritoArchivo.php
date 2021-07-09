<?php

namespace backend\models\Escrito;

use Yii;

/**
 * This is the model class for table "escrito_archivo".
 *
 * @property int $id_escrito_archivo
 * @property int $id_escrito
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class EscritoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escrito_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_archivo'], 'required'],
            [['id_escrito', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_escrito_archivo' => 'Escrito Archivo',
            'id_escrito' => 'Escrito',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }
}
