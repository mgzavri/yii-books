<?php

use app\models\Author;
use app\models\Book;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php /* echo $this->render('_search', ['model' => $searchModel]); */?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'isbn',
            'pageCount',
            'publishedDate',
            [   'attribute'=>'status',
                'label'=>'Статус',
                'format'=>'text',
                'content'=>function($data){
                    return $data->status;
                },
                'filter' => Book::getStatusList()
            ],
            [   'attribute'=>'authors',
                'label'=>'Автор(ы)',
                'format'=>'text',
                'content'=>function($data){
                    $auth = null;
                   foreach ($data->authors as $author){
                       $auth .= '<p>'.$author->title.'</p>';
                   }
                   return $auth;
                },
              //  'filter' => Author::getAuthorList()
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
