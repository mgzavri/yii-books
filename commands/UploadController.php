<?php


namespace app\commands;

use yii\console\Controller;
use app\models\Category;

class UploadController extends Controller
{
    public function actionIndex()
    {
        echo 'start' . PHP_EOL;
        if ($this->uploadJSON()) {
            echo 'uploaded' . PHP_EOL;
        } else {
            echo 'error' . PHP_EOL;
        }

        die;
    }

    private function uploadJSON()
    {

        /**
         * получаем json с книжками из захардкоженного Url
         */

        $url= 'https://gitlab.com/prog-positron/test-app-vacancy/-/raw/master/books.json';
        $json = file_get_contents($url);


        $books = json_decode($json);

       //вытаскиваем категории, авторов и статусы для связывания

        foreach ($books as $book){
            $categories[] = $book->categories;
            $authors[] = $book->authors;
            $status[] = $book->status;
        }




        return true;
    }
}
