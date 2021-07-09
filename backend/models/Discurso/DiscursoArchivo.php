<?php

namespace backend\models\Discurso;

use Yii;

/**
 * This is the model class for table "discurso_archivo".
 *
 * @property int $id_discurso_archivo
 * @property int $id_discurso
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class DiscursoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discurso_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_discurso', 'id_archivo', 'nota', 'portada'], 'required'],
            [['id_discurso', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_discurso_archivo' => 'Discurso Archivo',
            'id_discurso' => 'Discurso',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];
    }
}
