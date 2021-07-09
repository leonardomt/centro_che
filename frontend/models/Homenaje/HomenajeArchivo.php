<?php

namespace frontend\models\Homenaje;

use Yii;

/**
 * This is the model class for table "homenaje_archivo".
 *
 * @property string $id_homenaje_archivo
 * @property int $id_homenaje
 * @property int $id_archivo
 */
class HomenajeArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homenaje_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_homenaje', 'id_archivo'], 'required'],
            [['id_homenaje', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_homenaje_archivo' => 'Id Homenaje Archivo',
            'id_homenaje' => 'Id Homenaje',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
