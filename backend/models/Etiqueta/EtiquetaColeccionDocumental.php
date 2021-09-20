<?php

namespace backend\models\Etiqueta;

use Yii;

/**
 * This is the model class for table "etiqueta_coleccion_documental".
 *
 * @property int $id
 * @property int $id_etiqueta
 * @property int $id_coleccion_documental
 */
class EtiquetaColeccionDocumental extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etiqueta_coleccion_documental';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_etiqueta', 'id_coleccion_documental'], 'required'],
            [['id_etiqueta', 'id_coleccion_documental'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_etiqueta' => 'Id Etiqueta',
            'id_coleccion_documental' => 'Id Coleccion Documental',
        ];
    }
}
