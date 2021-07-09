<?php

namespace frontend\models\LineaInvestigacion;

use Yii;

/**
 * This is the model class for table "linea_investigacion_archivo".
 *
 * @property string $id_linea_investigacion_archivo
 * @property int $id_linea_investigacion
 * @property int $id_archivo
 */
class LineaInvestigacionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linea_investigacion_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_linea_investigacion', 'id_archivo'], 'required'],
            [['id_linea_investigacion', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_linea_investigacion_archivo' => 'Id Linea Investigacion Archivo',
            'id_linea_investigacion' => 'Id Linea Investigacion',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
