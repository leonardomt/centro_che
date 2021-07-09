<?php

namespace frontend\models\Noticia;

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
            [['revisado', 'publico', 'titulo_noticia', 'fecha', 'referencia', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo_noticia', 'referencia', 'descripcion'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_noticia' => 'Id Noticia',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo_noticia' => 'Titulo Noticia',
            'fecha' => 'Fecha',
            'referencia' => 'Referencia',
            'descripcion' => 'Descripcion',
        ];
    }
}
