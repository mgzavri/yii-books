<?php


namespace app\controllers;
use app\models\Book;
use app\models\Category;
use app\models\CategorySearch;
use app\models\Config;
use Yii;
use yii\data\Sort;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{

     public function actionIndex()
     {
        /*
         * $itemsNum - для настройки количества вывода на страницу,
         * настройте параметр items_per_page в Админке Controls->Settings
        */

         $itemsNum = Config::find()->select(['items_per_page'])->one();
         $items = $itemsNum->items_per_page ?? 20;
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
        $model = Category::getAllById($id);
        $children = Category::getChildren($id);

        return $this->render('view', [
            'model' => $model,
            'children' =>$children
        ]);
    }






}
