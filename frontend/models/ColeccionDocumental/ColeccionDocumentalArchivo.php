<?php

namespace frontend\models\ColeccionDocumental;

use Yii;

/**
 * This is the model class for table "coleccion_documental_archivo".
 *
 * @property string $id_coleccion_documental_archivo
 * @property int $id_coleccion_documental
 * @property int $id_archivo
 */
class ColeccionDocumentalArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_coleccion_documental', 'id_archivo'], 'required'],
            [['id_coleccion_documental', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_coleccion_documental_archivo' => 'Id Coleccion Documental Archivo',
            'id_coleccion_documental' => 'Id Coleccion Documental',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
