<?php

namespace backend\models\GestionDocumental;

use Yii;

/**
 * This is the model class for table "gestion_documental".
 *
 * @property int $id_gestion_documental
 * @property string $descripcion
 */
class GestionDocumental extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gestion_documental';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gestion_documental' => 'Id Gestion Documental',
            'descripcion' => 'Descripción',
        ];
    }
}
