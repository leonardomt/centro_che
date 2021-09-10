<?php

namespace backend\models\CursoOnline;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "curso_online".
 *
 * @property string $id_curso
 * @property int $revisado
 * @property int $publico
 * @property string $coordinador
 * @property string $titulo
 * @property string $descripcion
 * @property string $pdf
 * @property string $enlace
 */
class CursoOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'curso_online';
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
            [['revisado', 'publico', 'coordinador', 'titulo', 'descripcion', 'enlace', 'file'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'pdf', 'coordinador', 'enlace'], 'string'],
            [['file'], 'file',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Curso',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'contacto' => 'Contacto',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'pdf' => 'Documentación',
            'enlace' => 'Enlace',
            'file' => 'Documentación',
        ];
    }
}
