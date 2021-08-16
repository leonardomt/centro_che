<?php

namespace backend\models\Archivo;

use backend\models\Noticia\NoticiaArchivo;
use Yii;

/**
 * This is the model class for table "archivo".
 *
 * @property string $id_archivo
 * @property int $revisado
 * @property string $titulo_archivo
 * @property int $tipo_archivo
 * @property string $autor_archivo
 * @property string $fuente
 * @property string $etiqueta
 * @property string $descripcion_archivo
 * @property string $url_archivo
 * @property string fecha
 * @property string etapa
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
            [['revisado', 'titulo_archivo', 'etiqueta',  'descripcion_archivo'], 'required'],
            [['revisado'], 'integer'],
            [['descripcion_archivo'], 'string'],
            [['titulo_archivo'], 'string', 'max' => 124],
            [['autor_archivo', 'etapa'], 'string', 'max' => 64],
            [['etiqueta'], 'string', 'max' => 124],
            [['fuente'], 'string', 'max' => 256],
            [['autor_archivo'], 'string', 'max' => 64],
            [['url_archivo'], 'string', 'max' => 256],
            [['fecha'], 'safe'],
            [
                ['file'], 'file',
                'skipOnEmpty' => false,
                'on' => 'create',
                'extensions' => 'mp4 , jpg, jpeg, png, mp3, gif',
                'maxSize' => 1024 * 1024 * 100,
                'wrongExtension' => 'El archivo {file} no tiene una extensión permitida ( {extensions} )',
                'tooBig' => 'El archivo sobrepasa el tamaño máximo permitido ',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_archivo' => 'Archivo',
            'revisado' => 'Revisado',
            'titulo_archivo' => 'Título del Archivo',
            'tipo_archivo' => 'Tipo de Archivo',
            'autor_archivo' => 'Autor del Archivo',
            'etiqueta' => 'Etiqueta',
            'fuente' => 'Fuente',
            'descripcion_archivo' => 'Descripción del Archivo',
            'file' => 'Fichero',
            'url_archivo' => 'Archivo',
            'fecha' => 'Fecha',
            'etapa' => 'Etapa',
        ];
    }

    public function getTipoArchivo()        
    {
        return $this->hasOne(TipoArchivo::className(), ['id_tipo_archivo' => 'tipo_archivo']);
    }


    public function getNoticiaArchivo()
    {
        return $this->hasOne(NoticiaArchivo::className(), ['id_archivo' => 'id_archivo']);
    }


}
