<?php

namespace frontend\models\ProductoAudiovisual;

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
            [['revisado', 'publico', 'descripcion', 'tipo'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['descripcion', 'tipo','titulo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto_audiovisual' => 'Id Producto Audiovisual',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'tipo' => 'Tipo',
        ];
    }
}
