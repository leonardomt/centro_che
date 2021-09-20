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
    public $fecha_inicio;
    public $fecha_anno;
    public $fecha_anno_fin;
    public $fecha_anno_inicio;
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
            [['revisado', 'publico', 'tipo_fecha', 'fecha_anno', 'fecha_anno_inicio', 'fecha_anno_fin'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'entidad', 'autor'], 'string'],
            [['enlace'], 'string', 'max' => 512],
            [['fecha', 'fecha_fin'], 'safe'],
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
            'anno' => 'anno',
            'fecha_inicio' => 'Fecha de inicio',
            'fecha_anno' => 'Año',
            'fecha_anno_fin' => 'Año final',
            'fecha_anno_inicio' => 'Año de inicio',


        ];
    }
}
