<?php

namespace frontend\models\CursoOnline;

use Yii;

/**
 * This is the model class for table "curso_online_archivo".
 *
 * @property string $id_curso_online_archivo
 * @property int $id_curso_online
 * @property int $id_archivo
 */
class CursoOnlineArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso_online_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso_online', 'id_archivo'], 'required'],
            [['id_curso_online', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso_online_archivo' => 'Id Curso Online Archivo',
            'id_curso_online' => 'Id Curso Online',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
