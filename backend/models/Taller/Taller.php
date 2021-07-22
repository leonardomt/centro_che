<?php

namespace backend\models\Taller;

use Yii;

/**
 * This is the model class for table "taller".
 *
 * @property string $id_taller
 * @property int $publico
 * @property int $revisado
 * @property string $nombre
 * @property string $descripcion
 * @property string $contacto
 * @property string $encargado
 * @property string $tipo
 * @property string $cuerpo
 */
class Taller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publico', 'nombre', 'descripcion', 'encargado', 'tipo', 'revisado'], 'required'],
            [['publico', 'revisado'], 'integer'],
            [['nombre', 'descripcion', 'contacto', 'encargado', 'tipo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_taller' => 'Taller',
            'publico' => 'Público',
            'nombre' => 'Título',
            'descripcion' => 'Descripción',
            'contacto' => 'Contacto',
            'encargado' => 'Profesor',
            'tipo' => 'Tipo',
            'revisado' => 'Revisado',
        ];
    }

    public function getTipoTaller(){
        return $this->hasOne(TipoTaller::className(), ['id'=>'tipo']);
    }

    public function getTipoArchivo()
    {
        return $this->hasOne(TipoArchivo::className(), ['id_tipo_archivo' => 'tipo_archivo']);
    }
}
