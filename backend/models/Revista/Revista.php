<?php

namespace backend\models\Revista;

use Yii;

/**
 * This is the model class for table "revista".
 *
 * @property string $id_revista
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $enlace
 * @property int $mes
 * @property int $anno
 * @property string $volumen
 * @property string $numero
 */
class Revista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'anno', 'volumen', 'numero'], 'required'],
            [['revisado', 'publico', 'mes', 'anno'], 'integer'],
            [['descripcion', 'enlace', 'volumen', 'numero'], 'string'],
            [['titulo'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_revista' => 'Revista',
            'revisado' => 'Revisado',
            'publico' => 'Público',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'enlace' => 'Enlace',
            'mes' => 'Mes',
            'anno' => 'Año',
            'numero' => 'Número',
            'volumen' => 'Volumen',
        ];
    }

    public function getYearsList() {
        $currentYear = date('Y');
        $yearFrom = 2000;
        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }
}
