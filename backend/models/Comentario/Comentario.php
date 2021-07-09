<?php

namespace backend\models\Comentario;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string $fecha
 * @property string $alias
 * @property string $correo
 * @property string $comentario
 * @property int $tabla
 * @property int $id_tabla
 * @property int $publico
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'alias', 'correo', 'comentario', 'tabla', 'id_tabla', 'publico'], 'required'],
            [['fecha'], 'safe'],
            [['comentario', 'tabla'], 'string'],
            [[ 'id_tabla', 'publico'], 'integer'],
            [['alias'], 'string', 'max' => 256],
            [['tabla'], 'string', 'max' => 128],
            [['correo'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha y hora',
            'alias' => 'Alias',
            'correo' => 'Correo',
            'comentario' => 'Comentario',
            'tabla' => 'Tabla',
            'id_tabla' => 'Tabla',
            'publico' => 'Publico',
        ];
    }
}
