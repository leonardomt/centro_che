<?php

namespace backend\models\Revista;

use backend\models\Archivo\Archivo;
use Yii;

/**
 * This is the model class for table "revista_archivo".
 *
 * @property string $id
 * @property int $id_revista
 * @property int $id_archivo
 */
class RevistaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revista_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_archivo'], 'required'],
            [['id_revista', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_revista' => 'Revista',
            'id_archivo' => 'Archivo',
        ];
    }

    public function getRevista(){
        return $this->hasOne(Revista::className(), ['id_revista'=>'id_revista']);
    }

    public function getArchivo(){
        return $this->hasOne(Archivo::className(), ['id_archivo'=>'id_archivo']);
    }
}
