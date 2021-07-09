<?php

namespace frontend\models\Articulo;

use Yii;

/**
 * This is the model class for table "articulo_archivo".
 *
 * @property string $id_articulo_archivo
 * @property int $id_articulo
 * @property int $id_archivo
 */
class ArticuloArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_articulo', 'id_archivo'], 'required'],
            [['id_articulo', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_articulo_archivo' => 'Id Articulo Archivo',
            'id_articulo' => 'Id Articulo',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
