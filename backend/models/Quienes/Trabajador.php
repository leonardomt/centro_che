<?php

namespace backend\models\Quienes;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "trabajador".
 *
 * @property int $id
 * @property string $nombre
 * @property string $cargo
 * @property string $correo
 * @property string $area
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajador';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cargo', 'correo', 'area'], 'required'],
            [['nombre', 'cargo', 'correo'], 'string', 'max' => 256],
            [['area'], 'string', 'max' => 128],
            [['correo'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre y apellidos',
            'cargo' => 'Cargo',
            'correo' => 'Correo',
            'area' => 'Área de trabajo',
        ];
    }
}
