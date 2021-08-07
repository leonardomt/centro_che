<?php

namespace backend\models\Noticia;

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo_noticia', 'fecha', 'descripcion', 'cuerpo', 'autor', 'etiqueta'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo_noticia', 'referencia', 'descripcion', 'cuerpo', 'autor', 'contacto', 'fuente', 'etiqueta'], 'string'],
            [['fecha'], 'safe'],
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
