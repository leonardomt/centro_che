<?php

namespace backend\models\Testimonio;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "testimonio".
 *
 * @property int $id_testimonio
 * @property string $titulo
 * @property string $autor
 * @property string $fecha
 * @property string $descripcion
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 */
class Testimonio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonio';
    }

    public function behaviors(){
        return [

            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::className()
            ],

        ];
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
            [['titulo', 'autor','descripcion', 'cuerpo', 'revisado', 'publico'], 'required'],
            [['titulo', 'descripcion', 'cuerpo'], 'string'],
            [['fecha'], 'safe'],
            [['revisado', 'publico'], 'integer'],
            [['autor'], 'string'],
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
            'id_testimonio' => 'Id Testimonio',
            'titulo' => 'Título',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
        ];
    }
}
