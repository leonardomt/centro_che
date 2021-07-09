<?php

namespace backend\models\Articulo;

use Yii;

/**
 * This is the model class for table "tipo_articulo".
 *
 * @property string $id_tipo_articulo
 * @property string $tipo_articulo
 */
class TipoArticulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_articulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_articulo'], 'required'],
            [['tipo_articulo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_articulo' => 'Tipo Articulo',
            'tipo_articulo' => 'Tipo de Artículo',
        ];
    }
}
