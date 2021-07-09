<?php

namespace frontend\models\Articulo;

use Yii;

/**
 * This is the model class for table "articulo".
 *
 * @property string $id_articulo
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $autor
 * @property string $fecha
 * @property string $descripcion
 * @property int $id_tipo_articulo
 */
class Articulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'autor', 'fecha', 'descripcion', 'id_tipo_articulo'], 'required'],
            [['revisado', 'publico', 'id_tipo_articulo'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string'],
            [['titulo', 'autor'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Id Articulo',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'id_tipo_articulo' => 'Tipo Articulo',
        ];
    }

    public function getTipoArticulo(){
        return $this->hasOne(TipoArticulo::className(), ['id_tipo_articulo'=>'id_tipo_articulo']);
    }
}
