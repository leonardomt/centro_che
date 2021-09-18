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
 * @property string $fecha
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
            [['revisado', 'publico', 'titulo', 'descripcion', 'cuerpo'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo', 'etapa'], 'string'],
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
            'id_hecho' => 'Hecho',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'fecha' => 'Fecha',
            'etapa' => 'Etapa',
        ];
    }
}
