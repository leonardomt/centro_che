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


    public function behaviors(){
        return [

            'auditEntryBehaviors' => [
            'class' => AuditEntryBehaviors::className()
        ],

        ];
    }
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

    public function afterDeleted($id)
    {


        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();

        } catch (Exception $e) { //If we have no user object, this must be a command line program
            $userId = self::NO_USER_ID;
        }

        $log = new AuditEntry();
        $log->audit_entry_old_value = 'NA';
        $log->audit_entry_new_value = 'NA';
        $log->audit_entry_operation = 'Eliminar';
        $log->audit_entry_record = $id;
        $log->audit_entry_model_id = $id;
        $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = 'Archivo';
        $log->audit_entry_field_name = 'N/A';

        $log->audit_entry_timestamp = new \yii\db\Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }

}
