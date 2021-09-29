<?php

namespace backend\models\Archivo;

use backend\models\Noticia\NoticiaArchivo;
use Matrix\Exception;
use ruturajmaniyar\mod\audit\models\AuditEntry;
use Yii;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
    public $etiquetasarray;
    public $file;
    public $year;
    public $month;
    public $day;
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        $last = date("Y");
        return [
            [['revisado','etiquetasarray', 'titulo_archivo', 'descripcion_archivo'], 'required'],
            [['revisado'], 'integer'],
            [['descripcion_archivo'], 'string'],
            [['titulo_archivo'], 'string'],
            [[ 'etapa'], 'string', 'max' => 64],
            [['etiqueta'], 'string'],
            [['fuente'], 'string'],
            [['autor_archivo'], 'string'],
            [['url_archivo'], 'string'],
            [['fecha'], 'safe' ],
            [['titulo_archivo'], 'unique'],
            [['year'], 'integer', 'max' => $last, 'min' => 1800],
            [['month'], 'integer', 'max' => 12, 'min' => 00],
            [['day'], 'integer', 'max' => 31, 'min' => 01],
            [
                ['file'], 'file',
                'skipOnEmpty' => false,
                'on' => 'create',
                'extensions' => 'mp4 , jpg, jpeg, png, mp3, gif',
                'maxSize' => 1024 * 1024 * 10000,
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
            'etiquetasarray' => 'Etiquetas',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
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
