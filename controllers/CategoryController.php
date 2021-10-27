<?php


namespace app\controllers;
use app\models\Book;
use app\models\Category;
use app\models\CategorySearch;
use app\models\Config;
use Yii;
use yii\data\Sort;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function beforeAction($action)
    {
        Url::remember();
        return parent::beforeAction($action);
    }
     public function actionIndex()
     {
        /*
         * $items - для настройки количества вывода на страницу,
         * добавьте параметр items_per_pages в Админке Controls->Settings
        */

         if (property_exists(Yii::$app->config,'items_per_pages')){
             $items = Yii::$app->config->items_per_pages;
         }else{
             $items   =  20;
         }
         $searchModel = new CategorySearch();
         $dataProvider = $searchModel->search($this->request->queryParams);
         $dataProvider->pagination = ['pageSize' => $items];

         $dataProvider->sort = new Sort([
             'attributes' => [
                 'title',
             ],
         ]);



         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider
         ]);


        /* $sort = new Sort([
             'attributes' => [
                 'title',
             ],
         ]);
        */
     }

    public function actionView(){
        $id = Yii::$app->request->get('id');
        if (property_exists(Yii::$app->config,'items_per_pages')){
        $items = Yii::$app->config->items_per_pages;
        }else{
            $items   =  20;
        }


        $dataProvider = Category::getBooksByCatID($id);
        $dataProvider->pagination = ['pageSize' => $items];
        $categoryTitle = Category::findOne(['id'=>$id])->title;

        $children = Category::getChildren($id);

        return $this->render('view', [
            'books' => $dataProvider,
            'children' =>$children,
            'title'=>$categoryTitle
        ]);
    }






}
