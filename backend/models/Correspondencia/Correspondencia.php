<?php

namespace backend\models\Correspondencia;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "correspondencia".
 *
 * @property string $id_correspondencia
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $destinatario
 * @property string $remitente
 * @property string $fecha
 */
class Correspondencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correspondencia';
    }


    public $year;
    public $month;
    public $day;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'year', 'month', 'day', 'cuerpo', 'destinatario', 'remitente'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'destinatario', 'remitente'], 'string'],
            [['fecha'], 'safe'],
            [['year'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month'], 'integer', 'max' => 12, 'min' => 00],
            [['day'], 'integer', 'max' => 31, 'min' => 01],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_correspondencia' => 'Correspondencia',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'destinatario' => 'Destinatario',
            'remitente' => 'Remitente',
            'fecha' => 'Fecha',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
        ];
    }
}
