<?php

namespace backend\models\Hecho;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "hecho".
 *
 * @property string $id_hecho
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $etapa
 * @property int $tipo_fecha
 * @property string $fecha
 * @property string $fecha_fin
 */
class Hecho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hecho';
    }


    public $year;
    public $month;
    public $day;

    public $year_end;
    public $month_end;
    public $day_end;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo','tipo_fecha', 'descripcion', 'cuerpo'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'etapa'], 'string'],
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
            'id_hecho' => 'Hecho',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'fecha' => 'Fecha',
            'etapa' => 'Etapa',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
            'year_end' => 'Año final',
            'month_end' => 'Mes final',
            'day_end' => 'Día final',
        ];
    }
}
