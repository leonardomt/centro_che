<?php

namespace backend\models\Quienes;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property int $id
 * @property string $direccion
 * @property string $telefono1
 * @property string|null $telefono2
 * @property string $correo
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direccion', 'telefono1', 'correo'], 'required'],
            [['direccion'], 'string'],
            [['telefono1', 'telefono2'], 'string', 'max' => 64],
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
            'direccion' => 'Dirección',
            'telefono1' => 'Telefono 1',
            'telefono2' => 'Telefono 2',
            'correo' => 'Correo',
        ];
    }
}
