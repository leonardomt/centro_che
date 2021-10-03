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
 * @property int $tipo_fecha
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

    public $year;
    public $month;
    public $day;

    public $year_end;
    public $month_end;
    public $day_end;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programacion';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'descripcion', 'lugar' , 'tipo_fecha', 'titulo'], 'required'],
            [['revisado', 'publico', 'tipo_fecha'], 'integer'],
            [['descripcion', 'titulo', 'lugar', 'hora'], 'string'],
            [['fecha', 'fecha_fin'], 'safe'],
            [['year'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month'], 'integer', 'max' => 12, 'min' => 00],
            [['day'], 'integer', 'max' => 31, 'min' => 01],
            [['year_end'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month_end'], 'integer', 'max' => 12, 'min' => 00],
            [['day_end'], 'integer', 'max' => 31, 'min' => 01],

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
            'tipo_fecha' => 'Tipo de Fecha',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
            'year_end' => 'Año final',
            'month_end' => 'Mes final',
            'day_end' => 'Día final',
        ];
    }



}
