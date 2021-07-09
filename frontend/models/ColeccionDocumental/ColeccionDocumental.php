<?php

namespace frontend\models\ColeccionDocumental;

use Yii;

/**
 * This is the model class for table "coleccion_documental".
 *
 * @property string $id_coleccion_documental
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 */
class ColeccionDocumental extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccion_documental';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_coleccion_documental' => 'Id Coleccion Documental',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
        ];
    }
}
