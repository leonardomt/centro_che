<?php

namespace frontend\models\Correspondencia;

use Yii;

/**
 * This is the model class for table "correspondencia".
 *
 * @property string $id_correspondencia
 * @property int $revisado
 * @property int $publico
 * @property string $titulo
 * @property string $descripcion
 * @property string $destinatario
 * @property string $remitente
 * @property string $fecha
 */
class Correspondencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correspondencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revisado', 'publico', 'titulo', 'descripcion', 'destinatario', 'remitente', 'fecha'], 'required'],
            [['revisado', 'publico'], 'integer'],
            [['titulo', 'descripcion', 'destinatario', 'remitente'], 'string'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_correspondencia' => 'Id Correspondencia',
            'revisado' => 'Revisado',
            'publico' => 'Publico',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'destinatario' => 'Destinatario',
            'remitente' => 'Remitente',
            'fecha' => 'Fecha',
        ];
    }
}
