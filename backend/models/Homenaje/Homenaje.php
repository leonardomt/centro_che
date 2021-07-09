<?php

namespace backend\models\Homenaje;

use Yii;

/**
 * This is the model class for table "homenaje".
 *
 * @property string $id_homenaje
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
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
            [['revisado', 'publico', 'titulo', 'descripcion', 'cuerpo', 'id_tipo_homenaje'], 'required'],
            [['revisado', 'publico', 'id_tipo_homenaje'], 'integer'],
            [['titulo', 'descripcion', 'cuerpo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_homenaje' => 'Homenaje',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'id_tipo_homenaje' => 'Tipo de Homenaje',
        ];
    }
    public function getTipoHomenaje(){
        return $this->hasOne(TipoHomenaje::className(), ['id_tipo_homenaje'=>'id_tipo_homenaje']);
    }
}
