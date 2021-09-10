<?php

namespace backend\models\Comentario;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string $fecha
 * @property string $alias
 * @property string $correo
 * @property string $comentario
 * @property int $tabla
 * @property int $id_tabla
 * @property int $publico
 * @property int $revisado
 * @property string $seccion
 * @property int $respuesta
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
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
            [[ 'correo', 'comentario'], 'required'],
            [['fecha'], 'safe'],
            [['comentario', 'tabla'], 'string'],
            [[ 'id_tabla', 'publico', 'revisado', 'respuesta'], 'integer'],
            [['alias', 'seccion'], 'string', 'max' => 256],
            [['tabla'], 'string', 'max' => 128],
            [['correo'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha y hora',
            'alias' => 'Alias',
            'correo' => 'Correo',
            'comentario' => 'Comentario',
            'tabla' => 'Sección',
            'id_tabla' => 'Publicación',
            'publico' => 'Público',
            'revisado' => 'Revisado',
            'respuesta' => 'Respuesta',
            'seccion' => 'Área',
        ];
    }
}
