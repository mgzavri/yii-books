<?php


namespace app\controllers;
use app\models\Category;
use app\models\CategorySearch;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{

     public function actionIndex()
     {

         $searchModel = new CategorySearch();
         $dataProvider = $searchModel->search($this->request->queryParams);
         $dataProvider->pagination = ['pageSize' => 9];

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
         $searchModel = new CategorySearch();
         $dataProvider = $searchModel->search($this->request->queryParams);
         $dataProvider->pagination = ['pageSize'=>10];

         $query = Category::find();
         $countQuery = clone $query;
         $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 9]);

         $models =
             $query->offset($pages->offset)
                 ->limit($pages->limit)
                 ->orderBy($sort->orders)
                 ->all();


         return $this->render('index', [

            'pages' => 10,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
             'sort' => $sort
         ]);*/
     }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
