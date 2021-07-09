<?php

namespace frontend\models\Exposicion;

use Yii;

/**
 * This is the model class for table "exposicion".
 *
 * @property string $id_exposicion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $enlace
 */
class Exposicion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exposicion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'enlace'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion'], 'string'],
            [['enlace'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exposicion' => 'Id Exposicion',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'enlace' => 'Enlace',
        ];
    }
}
