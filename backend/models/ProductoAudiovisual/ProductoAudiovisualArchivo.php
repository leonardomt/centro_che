<?php

namespace backend\models\ProductoAudiovisual;

use Yii;

/**
 * This is the model class for table "producto_audiovisual_archivo".
 *
 * @property int $id_producto_audiovisual_archivo
 * @property int $id_producto_audiovisual
 * @property int $id_archivo
 * @property string $nota
 * @property int $portada
 */
class ProductoAudiovisualArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_audiovisual_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_archivo'], 'required'],
            [['id_producto_audiovisual', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto_audiovisual_archivo' => 'Producto Audiovisual Archivo',
            'id_producto_audiovisual' => 'Producto Audiovisual',
            'id_archivo' => 'Archivo',
            'portada' => 'Portada',
            'nota' => 'Nota',
        ];
    }
}
