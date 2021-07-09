<?php

namespace frontend\models\Investigacion;

use Yii;

/**
 * This is the model class for table "investigacion".
 *
 * @property string $id_investigacion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo_investigacion
 * @property string $descripcion
 * @property string $autor
 * @property int $id_linea_investigacion
 */
class Investigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investigacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo_investigacion', 'descripcion', 'autor', 'id_linea_investigacion'], 'required'],
            [['revisado', 'publico', 'id_linea_investigacion'], 'integer'],
            [['titulo_investigacion', 'descripcion', 'autor'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_investigacion' => 'Id Investigacion',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo_investigacion' => 'Titulo Investigacion',
            'descripcion' => 'Descripcion',
            'autor' => 'Autor',
            'id_linea_investigacion' => 'Id Linea Investigacion',
        ];
    }
}
