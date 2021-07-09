<?php

namespace frontend\models\CursoOnline;

use Yii;

/**
 * This is the model class for table "curso_online".
 *
 * @property string $id_curso
 * @property int $revisado
 * @property int $publico
 * @property string $contacto
 * @property string $titulo
 * @property string $descripcion
 */
class CursoOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso_online';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'contacto', 'titulo', 'descripcion'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['contacto', 'titulo', 'descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'contacto' => 'Contacto',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
        ];
    }
}
