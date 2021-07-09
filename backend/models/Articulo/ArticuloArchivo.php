<?php

namespace backend\models\Articulo;

use backend\models\Archivo\Archivo;
use Yii;

/**
 * This is the model class for table "articulo_archivo".
 *
 * @property string $id_articulo_archivo
 * @property int $id_articulo
 * @property int $id_archivo
 * @property int $id_portada
 * @property string $nota
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
            [[ 'id_archivo'], 'required'],
            [['id_articulo', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'id_articulo' => 'Artículo',
            'id_archivo' => 'Archivo',
            'nota' => 'Nota',
            'portada' => 'Portada',
        ];


    }

    public function getArticulo(){
        return $this->hasOne(Articulo::className(), ['id_articulo'=>'id_articulo']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
