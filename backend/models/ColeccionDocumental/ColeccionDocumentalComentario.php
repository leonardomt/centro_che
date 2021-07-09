<?php

namespace backend\models\ColeccionDocumental;

use Yii;

/**
 * This is the model class for table "coleccion_documental_comentario".
 *
 * @property string $id_coleccion_documental_comentario
 * @property int $revisado
 * @property int $publico
 * @property string $autor
 * @property string $fecha
 * @property string $comentario
 * @property int $id_coleccion_documental
 */
class ColeccionDocumentalComentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental_comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'autor', 'fecha', 'comentario', 'id_coleccion_documental'], 'required'],
            [['revisado', 'publico', 'id_coleccion_documental'], 'integer'],
            [['fecha'], 'safe'],
            [['comentario'], 'string'],
            [['autor'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_coleccion_documental_comentario' => 'Coleccion Documental Comentario',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'comentario' => 'Comentario',
            'id_coleccion_documental' => 'Colección Documental',
        ];
    }
}
