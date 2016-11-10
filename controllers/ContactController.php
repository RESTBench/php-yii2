<?php

namespace app\controllers;

use app\models\Contact;
use yii\web\Controller;
use yii\web\Response;

class ContactController extends Controller
{
    public function actionIndex()
    {
        $contacts = [];
        $contactsObjects = Contact::find()->all();
        /** @var Contact $object */
        foreach ($contactsObjects as &$object) {
            $contacts[] = [
                'id' => $object->id,
                'fist_name' => $object->first_name,
                'last_name' => $object->last_name,
                'age' => $object->age,
            ];
        }

        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;

        return [
            'data' => $contacts,
        ];
    }
}
