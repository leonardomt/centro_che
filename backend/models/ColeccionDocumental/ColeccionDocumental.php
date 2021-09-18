<?php

namespace backend\models\ColeccionDocumental;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "coleccion_documental".
 *
 * @property string $id_coleccion_documental
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $autor
 * @property string $etiquetas
 * @property string $tipologia
 * @property string $fecha
 * 
 */
class ColeccionDocumental extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental';
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
            [['revisado', 'publico', 'titulo', 'descripcion', 'fecha', 'autor', 'tipologia'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'autor', 'tipologia', 'etiquetas'], 'string'],
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
            'id_coleccion_documental' => 'Colección Documental',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'etiquetas' => 'Etiquetas',
            'tipologia' => 'Tipología Documental',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
        ];
    }
}
