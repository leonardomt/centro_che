<?php

namespace backend\models\Articulo;

use backend\models\Investigacion\Investigacion;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "articulo".
 *
 * @property string $id_articulo
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $autor
 * @property int $tipo_fecha
 * @property string $fecha
 * @property string $fecha_fin
 * @property string $resumen
 * @property string $cuerpo
 * @property int $id_investigacion
 * @property string $palabras_clave
 * @property string $keywords
 * @property string $abstract
 */
class Articulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo';
    }


    public $year;
    public $month;
    public $day;

    public $year_end;
    public $month_end;
    public $day_end;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'autor', 'tipo_fecha', 'resumen','cuerpo','abstract', 'keywords', 'palabras_clave'], 'required'],
            [['revisado', 'publico', 'id_investigacion'], 'integer'],
            [['fecha'], 'safe'],
            [['resumen','cuerpo', 'abstract', 'keywords', 'palabras_clave'], 'string'],
            [['titulo', 'autor'], 'string', 'max' => 200],
            [['fecha', 'fecha_fin'], 'safe'],
            [['year'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month'], 'integer', 'max' => 12, 'min' => 00],
            [['day'], 'integer', 'max' => 31, 'min' => 01],
            [['year_end'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month_end'], 'integer', 'max' => 12, 'min' => 00],
            [['day_end'], 'integer', 'max' => 31, 'min' => 01],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Artículo',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'resumen' => 'Resumen',
            'cuerpo' => 'Cuerpo',
            'id_investigacion' => 'Investigación a la que pertenece',
            'keywords' => 'Keywords',
            'palabraas_clave' => 'Palabras Clave',
            'abstract' => 'Abstract',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',
            'year_end' => 'Año final',
            'month_end' => 'Mes final',
            'day_end' => 'Día final',
        ];
    }

    public function getInvestigacionInscrita(){
        return $this->hasOne(Investigacion::className(), ['id_investigacion'=>'id_investigacion']);
    }

}
