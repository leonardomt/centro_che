<?php

namespace backend\models\User;

use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

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
    public function rules()
    {
        return [
            [['item_name'], 'required'],
            [['created_at'], 'integer'],
            [['user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Rol',
            'user_id' => 'Usuario',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }
}
