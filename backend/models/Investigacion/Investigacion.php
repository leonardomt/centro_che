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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo_investigacion', 'descripcion', 'cuerpo', 'autor', 'id_linea_investigacion', 'entidad'], 'required'],
            [['revisado', 'publico', 'id_linea_investigacion'], 'integer'],
            [['titulo_investigacion', 'descripcion', 'cuerpo', 'autor', 'entidad'], 'string'],
            [['fecha'], 'safe'],
            [['fecha'], 'required', 'message' => 'Fecha no puede estar vacío o ser posterior al día de hoy.'],
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
        ];
    }
    public function getLineaInvestigacion(){
        return $this->hasOne(LineaInvestigacion::className(), ['id_linea_investigacion'=>'id_linea_investigacion']);
    }
}
