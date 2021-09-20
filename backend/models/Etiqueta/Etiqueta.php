<?php

namespace backend\models\Etiqueta;

use Yii;

/**
 * This is the model class for table "etiqueta".
 *
 * @property int $id
 * @property string $etiqueta
 */
class Etiqueta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etiqueta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['etiqueta'], 'required'],
            [['etiqueta'], 'string'],
            [['etiqueta'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etiqueta' => 'Etiqueta',
        ];
    }
}
