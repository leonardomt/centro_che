<?php

namespace backend\models\ProductoAudiovisual;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "producto_audiovisual".
 *
 * @property int $id_producto_audiovisual
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property int $tipo
 * @property string $fecha
 * @property string $autor
 * @property string $productora
 * 
 */
class ProductoAudiovisual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_audiovisual';
    }

    public function behaviors(){
        return [

            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::className()
            ],

        ];
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
            [['revisado', 'publico', 'descripcion', 'tipo' , 'titulo', 'autor', 'productora'], 'required'],
            [['revisado', 'publico','tipo'], 'integer'],
            [['descripcion', 'titulo', 'autor', 'productora'], 'string'],
            [['fecha'], 'safe'],
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
            'id_producto_audiovisual' => 'Producto Audiovisual',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'tipo'=>'Género',
            'fecha' => 'Fecha',
            'autor' => 'Autor',
            'productora' => 'Productora',
            'year' => 'Año',
            'month' => 'Mes',
            'day' => 'Día',

        ];
    }


    public function getTipoProducto(){
        return $this->hasOne(TipoProducto::className(), ['id'=>'tipo']);
    }
}
