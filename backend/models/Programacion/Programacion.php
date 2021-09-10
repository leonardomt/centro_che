<?php

namespace backend\models\Programacion;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "programacion".
 *
 * @property int $id
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $lugar
 * @property string $fecha
 * @property string $fecha_fin
 * @property string $hora
 *
 */
class Programacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programacion';
    }
    public function behaviors(){
        return [

            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::className()
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'descripcion', 'lugar' , 'titulo', 'fecha'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['descripcion', 'titulo', 'lugar', 'hora'], 'string'],
            [['fecha', 'fecha_fin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Programación Cultural',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'tipo'=>'Género',
            'fecha' => 'Fecha',
            'lugar' => 'Lugar',
            'hora' => 'Hora',

        ];
    }



}
