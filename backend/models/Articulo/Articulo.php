<?php

namespace backend\models\Articulo;

use backend\models\Investigacion\Investigacion;
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'autor', 'fecha', 'resumen','cuerpo','abstract', 'keywords', 'palabras_clave'], 'required'],
            [['revisado', 'publico', 'id_investigacion'], 'integer'],
            [['fecha'], 'safe'],
            [['resumen','cuerpo', 'abstract', 'keywords', 'palabras_clave'], 'string'],
            [['titulo', 'autor'], 'string', 'max' => 200],
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
        ];
    }

    public function getInvestigacionInscrita(){
        return $this->hasOne(Investigacion::className(), ['id_investigacion'=>'id_investigacion']);
    }

}
