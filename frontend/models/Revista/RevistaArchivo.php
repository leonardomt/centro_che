<?php

namespace frontend\models\Revista;

use Yii;

/**
 * This is the model class for table "revista_archivo".
 *
 * @property string $id_revista_archivo
 * @property int $id_revista
 * @property int $id_archivo
 */
class RevistaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revista_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_revista', 'id_archivo'], 'required'],
            [['id_revista', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_revista_archivo' => 'Id Revista Archivo',
            'id_revista' => 'Id Revista',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
