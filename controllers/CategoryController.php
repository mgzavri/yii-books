<?php


namespace app\controllers;
use app\models\Category;
use app\models\CategorySearch;
use yii\data\Pagination;
use yii\data\Sort;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{


     public function actionIndex()
     {
         $sort = new Sort([
             'attributes' => [
                 'title',
             ],
         ]);
         $searchModel = new CategorySearch();
         $dataProvider = $searchModel->search($this->request->queryParams);

         $query = Category::find();
         $countQuery = clone $query;
         $pages = new Pagination(['totalCount' => $countQuery->count()]);

         $models =
             $query->offset($pages->offset)
                 ->limit($pages->limit)
                 ->orderBy($sort->orders)
                 ->all();


         return $this->render('index', [
             'categories' => $models,
             'pages' => $pages,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
             'sort' => $sort
         ]);
     }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        echo $id;
    }
}
