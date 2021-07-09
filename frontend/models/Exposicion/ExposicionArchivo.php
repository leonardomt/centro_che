<?php

namespace frontend\models\Exposicion;

use Yii;

/**
 * This is the model class for table "exposicion_archivo".
 *
 * @property string $id_exposicion_archivo
 * @property int $id_exposicion
 * @property int $id_archivo
 */
class ExposicionArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposicion_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exposicion', 'id_archivo'], 'required'],
            [['id_exposicion', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exposicion_archivo' => 'Id Exposicion Archivo',
            'id_exposicion' => 'Id Exposicion',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
