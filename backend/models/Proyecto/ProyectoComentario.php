<?php

namespace backend\models\Proyecto;

use Yii;

/**
 * This is the model class for table "proyecto_comentario".
 *
 * @property int $id_proyecto_comentario
 * @property int $revisado
 * @property int $publico
 * @property string $autor
 * @property string $fecha
 * @property string $comentario
 * @property int $id_proyecto
 */
class ProyectoComentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto_comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'autor', 'fecha', 'comentario', 'id_proyecto'], 'required'],
            [['revisado', 'publico', 'id_proyecto'], 'integer'],
            [['autor', 'comentario'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyecto_comentario' => 'Proyecto Comentario',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'comentario' => 'Comentario',
            'id_proyecto' => 'Proyecto',
        ];
    }
}
