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
 * @property string $fecha
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'autor', 'year', 'month', 'day', 'resumen','cuerpo','abstract', 'keywords', 'palabras_clave'], 'required'],
            [['revisado', 'publico', 'id_investigacion'], 'integer'],
            [['fecha'], 'safe'],
            [['resumen','cuerpo', 'abstract', 'keywords', 'palabras_clave'], 'string'],
            [['titulo', 'autor'], 'string', 'max' => 200],
            [['year'], 'integer', 'max' => date("Y"), 'min' => 1800],
            [['month'], 'integer', 'max' => 12, 'min' => 00],
            [['day'], 'integer', 'max' => 31, 'min' => 01],
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
        ];
    }

    public function getInvestigacionInscrita(){
        return $this->hasOne(Investigacion::className(), ['id_investigacion'=>'id_investigacion']);
    }

}
