<?php


namespace app\commands;

use app\models\Author;
use app\models\Book;
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

        $url = 'https://gitlab.com/prog-positron/test-app-vacancy/-/raw/master/books.json';
        $json = file_get_contents($url);


        $books = json_decode($json, true);

        $json_authors = array();
        $json_categories = array();

        //вытаскиваем категории и авторов для связывания

        foreach ($books as $book) {
            $json_categories[] = $book['categories'];
            $json_authors[] = $book['authors'];
        }

        echo '================= Обновляем список категорий ================' . PHP_EOL;
        //  $this->addEntry('Category', $json_categories);

        echo '================= Обновляем список авторов ================' . PHP_EOL;
        //  $this->addEntry('Author', $json_authors);

        echo '================= Обновляем список книг ================' . PHP_EOL;

        $this->addBooks($books);


        return true;
    }

    private function addBooks($books)
    {
        for ($i = 0; $i < 2; $i++) {
            $isbn = $books[$i]['isbn'] ?? '';
            $title = $books[$i]['title'] ?? '';

            $categories = $this->getIDs('Category', $books[$i]['categories']);
            $authors = $this->getIDs('Author', $books[$i]['authors']);

            /**
             * Проверяем, существует ли запись с таким же тайтлом и isbn
             * Если существует - апдейтим ее,
             * если нет, то создаем новую запись
             */

            $book = Book::findOne(['isbn' => $isbn, 'title' => $title]);
            $publishDate = $books[$i]['publishedDate'] ?? [];
            $publishDate = $publishDate['$date'] ?? null;
            $publishDate = $publishDate ? date('Y-m-d', strtotime($publishDate)) : null;
            if (empty($book)) {
                $book = new Book();
            }

            $book->title = $title;
            $book->isbn = $isbn;
            $book->pageCount = $books[$i]['pageCount'] ?? 0;
            $book->publishedDate = $publishDate;
            $book->shortDescription = $books[$i]['shortDescription'] ?? null;
            $book->longDescription = $books[$i]['longDescription'] ?? null;
            $book->status = $books[$i]['status'] ?? null;
            $book->categories = $categories;
            $book->authors = $authors;
             if ($book->save()) {
                 echo $i . '. Сохраняем ' . $title . PHP_EOL;
             }

        }
    }

    private function getIDs($class, $array)
    {
        $class = 'app\models\\' . $class;
        if (is_array($array)) {
            foreach ($array as $arr) {
                $row = $class::findOne(['title' => $arr])->toArray();
                $ids[] = $row['id'];
            }
        }

        return $ids;
    }

    private function addEntry($class, $array)
    {
        $preparedArray = array();
        $class = 'app\models\\' . $class;
        foreach ($array as $arr) {
            for ($i = 0; $i < sizeof($arr); $i++) {
                if (!empty(trim($arr[$i]))) {
                    $preparedArray[] = strip_tags(trim($arr[$i]));
                }
            }
        }
        $preparedArray = array_values(array_unique(array_filter($preparedArray)));

        for ($i = 0; $i < sizeof($preparedArray); $i++) {
            $title = trim($preparedArray[$i]);
            if (!empty($title)) {
                $class::firstOrCreate(['title' => $title]);
                echo 'Проверяем ' . $i . ' - ' . $title . PHP_EOL;
            }

        }

    }
}
