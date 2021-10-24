<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookSearch;
use app\models\Category;
use app\models\CategorySearch;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'title',
            ],
        ]);
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $query = Book::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);

        $models =
            $query->offset($pages->offset)
                ->where(['1 IN (categories)'])
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

    /**
     * Displays a single Book model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


}
