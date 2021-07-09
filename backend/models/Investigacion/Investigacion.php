<?php

namespace backend\models\Investigacion;

use backend\models\LineaInvestigacion\LineaInvestigacion;
use Yii;

/**
 * This is the model class for table "investigacion".
 *
 * @property string $id_investigacion
 * @property int $revisado
 * @property int $publico
 * @property string $titulo_investigacion
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $autor
 * @property int $id_linea_investigacion
 */
class Investigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investigacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo_investigacion', 'descripcion', 'cuerpo', 'autor', 'id_linea_investigacion'], 'required'],
            [['revisado', 'publico', 'id_linea_investigacion'], 'integer'],
            [['titulo_investigacion', 'descripcion', 'cuerpo', 'autor'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_investigacion' => 'Investigación',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo_investigacion' => 'Título',
            'descripcion' => 'Descripción',
            'cuerpo' => 'Cuerpo',
            'autor' => 'Autor',
            'id_linea_investigacion' => 'Línea de Investigación',
        ];
    }
    public function getLineaInvestigacion(){
        return $this->hasOne(LineaInvestigacion::className(), ['id_linea_investigacion'=>'id_linea_investigacion']);
    }
}
