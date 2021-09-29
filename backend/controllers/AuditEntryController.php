<?php

namespace backend\controllers;

use backend\models\Articulo\Articulo;
use backend\models\AuditEntry;
use backend\models\User\User;
use Yii;
use backend\models\AuditEntrySearch;
use yii\db\Expression;
use yii\web\Controller;

/**
 * AuditEntryController implements the CRUD actions for AuditEntry model.
 */
class AuditEntryController extends Controller
{
    /**
     * Lists all AuditEntry models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditEntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function afterInsert($element, $place, $id, $title)
    {
        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();
        } catch (Exception $e) {
            $userId = self::NO_USER_ID;
        }
        $newAttributes = $element->attributes();
        foreach ($newAttributes as $value) {
            $log = new AuditEntry();
            $log->audit_entry_field_name = $value;
            $log->audit_entry_old_value = 'N/A';
            $log->audit_entry_new_value = $element->$value;
            $log->audit_entry_model_id = $id;
            $log->audit_entry_operation = 'Insertar';
            $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
            $log->audit_entry_user_name = $nombre->username;
            $log->audit_entry_model_name = get_class($element);
            $log->audit_entry_timestamp = new Expression('NOW()');
            $log->audit_entry_user_id = $userId;
            $log->audit_entry_ip = $userIpAddress;
            $log->place = $place;
            $log->title = $title;

            $log->save(false);
        }

        return true;
    }


    public function afterUpdate($oldElement, $newElement, $place,  $id, $title)
    {
        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();
        } catch (Exception $e) {
            $userId = self::NO_USER_ID;
        }
        $newAttributes = $newElement->attributes();

        foreach ($newAttributes as $value) {
            $log = new AuditEntry();
            $log->audit_entry_field_name = $value;
            if($oldElement->$value == null){
                $log->audit_entry_old_value = 'N/A';
            } else $log->audit_entry_old_value = $oldElement->$value;
            $log->audit_entry_new_value = $newElement->$value;
            $log->audit_entry_model_id = $id;
            $log->audit_entry_operation = 'Modificar';
            $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
            $log->audit_entry_user_name = $nombre->username;
            $log->audit_entry_model_name = get_class($newElement);
            $log->audit_entry_timestamp = new Expression('NOW()');
            $log->audit_entry_user_id = $userId;
            $log->audit_entry_ip = $userIpAddress;
            $log->place = $place;
            $log->title = $title;

            $log->save(false);
        }

        return true;
    }


    public function afterDelete($oldElement, $place, $id, $title)
    {
        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();

        } catch (Exception $e) { //If we have no user object, this must be a command line program
            $userId = self::NO_USER_ID;
        }

        $log = new AuditEntry();
        $log->audit_entry_old_value = 'N/A';
        $log->audit_entry_new_value = 'N/A';
        $log->audit_entry_operation = 'Eliminar';
        $log->audit_entry_model_id = $id;
        $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = get_class($oldElement);
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new Expression('NOW()');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;
        $log->place = $place;
        $log->title = $title;

        $log->save(false);
    }


}
