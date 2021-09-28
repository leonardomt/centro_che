<?php

namespace backend\models\Etiqueta;

use Yii;

/**
 * This is the model class for table "etiqueta_archivo".
 *
 * @property int $id
 * @property int $id_etiqueta
 * @property int $id_archivo
 */
class EtiquetaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etiqueta_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_etiqueta', 'id_archivo'], 'required'],
            [['id_etiqueta', 'id_archivo'], 'integer'],
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
            'id_archivo' => 'Id Archivo',
        ];
    }
}
