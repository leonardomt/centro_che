<?php

namespace frontend\models\Investigacion;

use Yii;

/**
 * This is the model class for table "investigacion_archivo".
 *
 * @property string $id_investigacion_archivo
 * @property int $id_investigacion
 * @property int $id_archivo
 */
class InvestigacionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investigacion_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_investigacion', 'id_archivo'], 'required'],
            [['id_investigacion', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_investigacion_archivo' => 'Id Investigacion Archivo',
            'id_investigacion' => 'Id Investigacion',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
