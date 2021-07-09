<?php

namespace frontend\models\Articulo;

use Yii;

/**
 * This is the model class for table "articulo_comentario".
 *
 * @property string $id_articulo_comentario
 * @property int $revisado
 * @property int $publico
 * @property string $autor
 * @property string $fecha
 * @property string $comentario
 * @property int $id_articulo
 */
class ArticuloComentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo_comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'autor', 'fecha', 'comentario', 'id_articulo'], 'required'],
            [['revisado', 'publico', 'id_articulo'], 'integer'],
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
            'id_articulo_comentario' => 'Id Articulo Comentario',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'comentario' => 'Comentario',
            'id_articulo' => 'Id Articulo',
        ];
    }
}
