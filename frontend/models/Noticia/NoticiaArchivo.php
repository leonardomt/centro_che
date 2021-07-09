<?php

namespace frontend\models\Noticia;

use Yii;

/**
 * This is the model class for table "noticia_archivo".
 *
 * @property string $id_noticia_archivo
 * @property int $id_noticia
 * @property int $id_archivo
 */
class NoticiaArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticia_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_noticia', 'id_archivo'], 'required'],
            [['id_noticia', 'id_archivo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_noticia_archivo' => 'Id Noticia Archivo',
            'id_noticia' => 'Id Noticia',
            'id_archivo' => 'Id Archivo',
        ];
    }
}
