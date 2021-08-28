<?php

namespace backend\models\Quienes;

use Yii;

/**
 * This is the model class for table "quienes_detalle".
 *
 * @property int $id
 * @property string $descripcion
 * @property string|null $extra
 */
class QuienesDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quienes_detalle';
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
            'descripcion' => 'Descripción Detallada',
            'extra' => 'Extra',
        ];
    }
}
