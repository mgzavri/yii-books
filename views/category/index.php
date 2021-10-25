<?php
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Категории</h1>

    </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="sort">
        <?php echo $sort->link('title');  ?>
    </div>
    <div class="d-flex justify-content-between flex-wrap">

        <?php foreach ($categories as $cats) : ?>
            <div class="card m-5" style="width: 20%;">
                <div class="card-body">
                    <h5 class="card-title"><?= $cats->title; ?></h5>
                    <?= Html::a('В категорию', ['category/view', 'id' => $cats->id], ['class' => 'btn btn-primary']) ?>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>


</div>
