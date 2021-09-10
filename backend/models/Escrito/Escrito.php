<?php

namespace backend\models\Escrito;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "escrito".
 *
 * @property int $id_escrito
 * @property string $tipo
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 * @property string $autor
 */
class Escrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escrito';
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
            [['tipo', 'titulo', 'descripcion', 'cuerpo', 'revisado', 'autor','publico'], 'required'],
            [['titulo', 'descripcion', 'autor', 'cuerpo'], 'string'],
            [['revisado', 'publico'], 'integer'],
            [['tipo'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_escrito' => 'Id Escrito',
            'tipo' => 'Tipo',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Contenido',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'autor' => 'Autor',
        ];
    }
}
