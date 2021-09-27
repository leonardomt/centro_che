<?php

namespace backend\models\Exposicion;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "exposicion".
 *
 * @property string $id_exposicion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $enlace
 * @property string $entidad
 * @property string $autor
 * @property int $tipo_fecha
 * @property string $fecha
 * @property string $fecha_fin
 */
class Exposicion extends \yii\db\ActiveRecord
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
        return 'exposicion';
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
            [['revisado', 'publico', 'titulo', 'descripcion', 'cuerpo', 'enlace', 'tipo_fecha', 'entidad', 'autor'], 'required'],
            [['revisado', 'publico', 'tipo_fecha'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'entidad', 'autor'], 'string'],
            [['enlace'], 'string', 'max' => 512],
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
            'id_exposicion' => 'Exposición',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'enlace' => 'Enlace',
            'tipo_fecha' => 'Tipo de Fecha',
            'fecha' => 'Fecha',
            'fecha_fin' => 'Fecha final',
            'entidad'=> 'Entidad Colaboradora',
            'autor'=> 'Autor',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
            'year_end' => 'Año final',
            'month_end' => 'Mes final',
            'day_end' => 'Día final',

        ];
    }
}
