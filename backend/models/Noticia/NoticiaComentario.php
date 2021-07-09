<?php

namespace backend\models\Noticia;

use Yii;

/**
 * This is the model class for table "noticia_comentario".
 *
 * @property int $id_noticia_comentario
 * @property int $revisado
 * @property int $publico
 * @property string $autor
 * @property string $fecha
 * @property string $comentario
 * @property int $id_noticia
 */
class NoticiaComentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticia_comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'autor', 'fecha', 'comentario', 'id_noticia'], 'required'],
            [['revisado', 'publico', 'id_noticia'], 'integer'],
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
            'id_noticia_comentario' => 'Noticia-Comentario',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'comentario' => 'Comentario',
            'id_noticia' => 'Noticia',
        ];
    }

    public function getNoticia(){
        return $this->hasOne(Noticia::className(), ['id_noticia'=>'id_noticia']);
    }
}
