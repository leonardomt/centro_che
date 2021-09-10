<?php

namespace backend\models\Discurso;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "discurso".
 *
 * @property int $id_discurso
 * @property string $titulo
 * @property string $fecha
 * @property string $descripcion
 * @property string $lugar
 * @property string $medio
 * @property string $entrevistador
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 * @property int $identificador
 */
class Discurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discurso';
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
            [['titulo', 'fecha', 'descripcion', 'cuerpo', 'revisado', 'publico', 'identificador'], 'required'],
            [['titulo', 'descripcion', 'lugar', 'entrevistador', 'cuerpo'], 'string'],
            [['fecha'], 'safe'],
            [['revisado', 'publico', 'identificador'], 'integer'],
            [['medio'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_discurso' => 'Id Discurso',
            'titulo' => 'Título',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripción',
            'lugar' => 'Lugar',
            'medio' => 'Medio',
            'entrevistador' => 'Entrevistador',
            'cuerpo' => 'Cuerpo',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'identificador' => 'Tipo',
        ];
    }
}
