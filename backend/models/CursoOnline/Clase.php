<?php

namespace backend\models\CursoOnline;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "clase".
 *
 * @property int $id
 * @property string $titulo
 * @property string $profesor
 * @property string $descripcion
 * @property string $enlace
 * @property int $revisado
 * @property int $publico
 * @property int $id_curso
 */
class Clase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clase';
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
            [['titulo', 'profesor', 'descripcion', 'enlace'], 'required'],
            [['descripcion', 'enlace'], 'string'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'profesor'], 'string', 'max' => 1024],
            [['enlace'], 'url'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Título',
            'profesor' => 'Profesor',
            'descripcion' => 'Descripción',
            'enlace' => 'Enlace',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'id_curso' => 'Curso Online'
        ];
    }
}
