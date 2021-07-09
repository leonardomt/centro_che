<?php

namespace backend\models\Galeria;

use Yii;

/**
 * This is the model class for table "galeria_vo".
 *
 * @property int $id_galeria_vo
 * @property int $id_archivo
 * @property int $tipo
 * @property string $genero
 * @property string $nota
 * @property int $publico
 * @property int $tipo_archivo
 */
class GaleriaVo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galeria_vo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[  'publico'], 'required'],
            [[ 'publico', 'tipo','tipo_archivo'], 'integer'],
            [['id_archivo', 'nota'], 'string'],
            [[ 'genero'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_galeria_vo' => 'Elemento',
            'id_archivo' => 'Archivo',
            'tipo' => 'Tipo',
            'genero' => 'Género',
            'nota' => 'Nota',
            'publico' => 'Público',
        ];
    }
}
