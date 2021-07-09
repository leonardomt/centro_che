<?php

namespace frontend\models\Hecho;

use Yii;

/**
 * This is the model class for table "hecho_archivo".
 *
 * @property string $id_hecho_archivo
 * @property int $id_hecho
 * @property int $id_archivo
 */
class HechoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hecho_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hecho', 'id_archivo'], 'required'],
            [['id_hecho', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hecho_archivo' => 'Id Hecho Archivo',
            'id_hecho' => 'Id Hecho',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
