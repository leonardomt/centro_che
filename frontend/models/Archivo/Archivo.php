<?php

namespace frontend\models\Archivo;

use Yii;

/**
 * This is the model class for table "archivo".
 *
 * @property string $id_archivo
 * @property int $revisado
 * @property string $titulo_archivo
 * @property int $tipo_archivo
 * @property string $autor_archivo
 * @property string $descripcion_archivo
 * @property string $url_archivo
 */
class Archivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'titulo_archivo', 'tipo_archivo', 'autor_archivo', 'descripcion_archivo','file'], 'required'],
            [['revisado'], 'integer'],
            [['descripcion_archivo'], 'string'],
            [['titulo_archivo'], 'string', 'max' => 124],
            [['autor_archivo'], 'string', 'max' => 64],
            [['url_archivo'], 'string', 'max' => 256],
            [['file'],'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_archivo' => 'Id Archivo',
            'revisado' => 'Revisado',
        
            'titulo_archivo' => 'Titulo Archivo',
            'tipo_archivo' => 'Tipo Archivo',
            'autor_archivo' => 'Autor Archivo',
            'descripcion_archivo' => 'Descripcion Archivo',
            'file' => 'File',
            'url_archivo' => 'Archivo',
        ];
    }

    public function getTipoArchivo(){
        return $this->hasOne(TipoArchivo::className(), ['tipo_archivo'=>'id_tipo_archivo']);
    }

}
