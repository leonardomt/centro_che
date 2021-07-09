<?php

namespace frontend\models\Correspondencia;

use Yii;

/**
 * This is the model class for table "correspondencia_archivo".
 *
 * @property string $id_correspondencia_archivo
 * @property int $id_correspondencia
 * @property int $id_archivo
 */
class CorrespondenciaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correspondencia_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_correspondencia', 'id_archivo'], 'required'],
            [['id_correspondencia', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_correspondencia_archivo' => 'Id Correspondencia Archivo',
            'id_correspondencia' => 'Id Correspondencia',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
