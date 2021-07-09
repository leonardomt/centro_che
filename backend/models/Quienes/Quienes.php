<?php

namespace backend\models\Quienes;

use Yii;

/**
 * This is the model class for table "quienes".
 *
 * @property int $id
 * @property string $descripcion
 * @property string|null $extra
 */
class Quienes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quienes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion', 'extra'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'extra' => 'Extra',
        ];
    }
}
