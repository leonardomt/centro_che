<?php

namespace backend\models\Revista;

use Yii;

/**
 * This is the model class for table "paradigma".
 *
 * @property int $id
 * @property string $descripcion
 * @property string|null $enlace
 */
class Paradigma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paradigma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion', 'enlace'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'enlace' => 'Enlace',
        ];
    }
}
