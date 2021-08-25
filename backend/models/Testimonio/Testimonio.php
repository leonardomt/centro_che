<?php

namespace backend\models\Testimonio;

use Yii;

/**
 * This is the model class for table "testimonio".
 *
 * @property int $id_testimonio
 * @property string $titulo
 * @property string $autor
 * @property string $fecha
 * @property string $descripcion
 * @property string $cuerpo
 * @property int $revisado
 * @property int $publico
 */
class Testimonio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'autor', 'fecha', 'descripcion', 'cuerpo', 'revisado', 'publico'], 'required'],
            [['titulo', 'descripcion', 'cuerpo'], 'string'],
            [['fecha'], 'safe'],
            [['revisado', 'publico'], 'integer'],
            [['autor'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_testimonio' => 'Id Testimonio',
            'titulo' => 'Título',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'revisado' => 'Revisado',
            'publico' => 'Público',
        ];
    }
}
