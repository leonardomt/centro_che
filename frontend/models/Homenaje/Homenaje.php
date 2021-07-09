<?php

namespace frontend\models\Homenaje;

use Yii;

/**
 * This is the model class for table "homenaje".
 *
 * @property string $id_homenaje
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property int $id_tipo_homenaje
 */
class Homenaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homenaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'id_tipo_homenaje'], 'required'],
            [['revisado', 'publico', 'id_tipo_homenaje'], 'integer'],
            [['titulo', 'descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_homenaje' => 'Id Homenaje',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'id_tipo_homenaje' => 'Id Tipo Homenaje',
        ];
    }
}
