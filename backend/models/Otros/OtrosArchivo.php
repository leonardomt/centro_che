<?php

namespace backend\models\Otros;

use Yii;

/**
 * This is the model class for table "otros_archivo".
 *
 * @property int $id
 * @property int $id_otros
 * @property int $id_archivo
 * @property int $portada
 * @property string|null $nota
 *
 * @property Otros $otros
 */
class OtrosArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otros_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_archivo'], 'required'],
            [['id_otros', 'id_archivo', 'portada'], 'integer'],
            [['nota'], 'string'],
            [['id_otros'], 'exist', 'skipOnError' => true, 'targetClass' => Otros::className(), 'targetAttribute' => ['id_otros' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_otros' => 'Otro',
            'id_archivo' => 'Archivo',
            'portada' => 'Portada',
            'nota' => 'Nota',
        ];
    }

    /**
     * Gets query for [[Otros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOtros()
    {
        return $this->hasOne(Otros::className(), ['id' => 'id_otros']);
    }
}
