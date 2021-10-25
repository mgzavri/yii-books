<?php


namespace app\modules\admin\controllers;


use yii\web\Controller;
use app\models\UploadForm;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $form_model = new UploadForm();
        return $this->render('index', compact('form_model'));
    }

    public function actionUpload()
    {
        $form_model = new UploadForm();
        return $this->render('index', compact('form_model'));
    }

}
