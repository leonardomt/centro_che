<?php

namespace backend\models\Noticia;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property string $id_noticia
 * @property int $revisado
 * @property int $publico
 * @property string $titulo_noticia
 * @property string $fecha
 * @property string $referencia
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $autor
 * @property string $contacto
 * @property string $fuente
 * @property string $etiqueta
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticia';
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
            [['revisado', 'publico', 'titulo_noticia', 'descripcion', 'cuerpo', 'autor', 'etiqueta'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo_noticia', 'referencia', 'descripcion', 'cuerpo', 'autor', 'contacto', 'fuente', 'etiqueta'], 'string'],
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
            'id_noticia' => 'Noticia',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo_noticia' => 'Título',
            'fecha' => 'Fecha',
            'referencia' => 'Enlace',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'autor' => 'Autor',
            'contacto' => 'Contacto',
            'fuente' => 'Fuente',
            'etiqueta' => 'Etiqueta',
        ];
    }
}
