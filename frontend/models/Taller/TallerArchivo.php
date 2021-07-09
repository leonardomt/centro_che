<?php

namespace frontend\models\Taller;

use Yii;

/**
 * This is the model class for table "taller_archivo".
 *
 * @property string $id_taller_archivo
 * @property int $id_taller
 * @property int $id_archivo
 */
class TallerArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taller_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_taller', 'id_archivo'], 'required'],
            [['id_taller', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_taller_archivo' => 'Id Taller Archivo',
            'id_taller' => 'Id Taller',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
