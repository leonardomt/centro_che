<?php

namespace frontend\models\LineaInvestigacion;

use Yii;

/**
 * This is the model class for table "linea_investigacion".
 *
 * @property string $id_linea_investigacion
 * @property int $revisado
 * @property int $publico
 * @property string $nombre_linea
 * @property string $descripcion
 */
class LineaInvestigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linea_investigacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'nombre_linea', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['nombre_linea', 'descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_linea_investigacion' => 'Id Linea Investigacion',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'nombre_linea' => 'Nombre Linea',
            'descripcion' => 'Descripcion',
        ];
    }
}
