<?php

namespace backend\models\ColeccionDocumental;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "coleccion_documental".
 *
 * @property string $id_coleccion_documental
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $autor
 * @property string $etiquetas
 * @property string $tipologia
 * @property string $fecha
 * 
 */
class ColeccionDocumental extends \yii\db\ActiveRecord
{
    public $etiquetasarray;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental';
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
            [['revisado', 'publico', 'etiquetasarray', 'titulo',  'descripcion','year', 'month', 'day',  'autor', 'tipologia'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'autor', 'tipologia', 'etiquetas'], 'string'],
            [['fecha'], 'safe'],
            [['fecha'], 'required', 'message' => 'Fecha no puede estar vacío o ser posterior al día de hoy.'],
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
            'id_coleccion_documental' => 'Colección Documental',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'etiquetas' => 'Etiquetas',
            'tipologia' => 'Tipología Documental',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'etiquetasarray' => 'Etiquetas',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
        ];
    }
}
