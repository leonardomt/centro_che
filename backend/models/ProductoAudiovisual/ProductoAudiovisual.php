<?php

namespace backend\models\ProductoAudiovisual;

use Yii;

/**
 * This is the model class for table "producto_audiovisual".
 *
 * @property int $id_producto_audiovisual
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $tipo
 * @property string $fecha
 * @property string $autor
 * @property string $productora
 * 
 */
class ProductoAudiovisual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_audiovisual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'descripcion', 'tipo' , 'titulo', 'fecha', 'autor', 'productora'], 'required'],
            [['revisado', 'publico','tipo'], 'integer'],
            [['descripcion', 'titulo', 'autor', 'productora'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto_audiovisual' => 'Producto Audiovisual',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'tipo'=>'Género',
            'fecha' => 'Fecha',
            'autor' => 'Autor',
            'productora' => 'Productora',

        ];
    }


    public function getTipoProducto(){
        return $this->hasOne(TipoProducto::className(), ['tipo'=>'id']);
    }
}
