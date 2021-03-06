<?php
namespace backend\models\Proyecto;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property int $id_proyecto
 * @property string $descripcion
 * @property string $enlace
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'enlace'], 'required'],
            [['descripcion', 'enlace'], 'string'],
            [['enlace'], 'url'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyecto' => 'Id Proyecto',
            'descripcion' => 'Descripción',
            'enlace' => 'Enlace',
        ];
    }
}
