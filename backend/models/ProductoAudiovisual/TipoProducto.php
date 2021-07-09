<?php

namespace backend\models\ProductoAudiovisual;

use Yii;

/**
 * This is the model class for table "tipo_producto".
 *
 * @property int $id
 * @property string $tipo_producto
 */
class TipoProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_producto'], 'required'],
            [['tipo_producto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_producto' => 'Tipo de Producto Audiovisual',
        ];
    }
}
