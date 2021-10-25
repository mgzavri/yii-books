<?php

use app\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'layout'=>"{pager}\n{items}",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            [
                'attribute'=>'parent',
                'label'=>'Родительская категория',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getParentTitle();
                },
                'filter' => Category::getParentsList()
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
