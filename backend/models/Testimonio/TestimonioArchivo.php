<?php

namespace backend\models\Testimonio;

use Yii;

/**
 * This is the model class for table "testimonio_archivo".
 *
 * @property int $id
 * @property int $id_testimonio
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class TestimonioArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonio_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'nota'], 'required'],
            [['id_testimonio', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Testimonio Archivo',
            'id_testimonio' => 'Testimonio',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }
}
