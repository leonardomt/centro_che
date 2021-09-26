<?php

namespace backend\models\LineaInvestigacion;

use backend\models\Archivo\Archivo;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "linea_investigacion".
 *
 * @property string $id_linea_investigacion
 * @property int $revisado
 * @property int $publico
 * @property string $nombre_linea
 * @property string $descripcion
 */
class LineaInvestigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linea_investigacion';
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
            [['revisado', 'publico', 'nombre_linea', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['nombre_linea', 'descripcion'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_linea_investigacion' => 'Línea de Investigación',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'nombre_linea' => 'Título',
            'descripcion' => 'Descripción',
            'fecha' => 'Fecha',
            'entidad' => 'Entidad en que se inscribe',
            'autor' => 'Autor',

        ];
    }






}
