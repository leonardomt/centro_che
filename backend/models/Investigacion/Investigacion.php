<?php

namespace backend\models\Investigacion;

use backend\models\LineaInvestigacion\LineaInvestigacion;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "investigacion".
 *
 * @property string $id_investigacion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo_investigacion
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $autor
 * @property int $id_linea_investigacion
 * @property string $fecha
 * @property string $entidad
 */
class Investigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investigacion';
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
            [['revisado', 'publico', 'titulo_investigacion','year', 'month', 'day', 'descripcion', 'cuerpo', 'autor', 'id_linea_investigacion', 'entidad'], 'required'],
            [['revisado', 'publico', 'id_linea_investigacion'], 'integer'],
            [['titulo_investigacion', 'descripcion', 'cuerpo', 'autor', 'entidad'], 'string'],
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
            'id_investigacion' => 'Investigación',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo_investigacion' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'autor' => 'Autor',
            'id_linea_investigacion' => 'Línea de Investigación',
            'entidad' => 'Entidad en que se inscribe',
            'fecha' => 'Fecha de Inscripción',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
        ];
    }
    public function getLineaInvestigacion(){
        return $this->hasOne(LineaInvestigacion::className(), ['id_linea_investigacion'=>'id_linea_investigacion']);
    }
}
