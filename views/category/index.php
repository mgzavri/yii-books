<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pages app\models\Category */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Категории</h1>

    </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <!--<div class="sort">
        <?php /*echo $sort->link('title');  */ ?>
    </div>-->
    <div class="d-flex justify-content-between flex-wrap">

        <?php foreach ($dataProvider->getModels() as $cats) :
            $block = ' <div class="" >
                        <div class="card-body">
                        <h5 class="card-title">'.$cats->title.'</h5>
                        </div>
                        </div>';
            ?>


            <?= Html::a($block, ['category/view', 'id' => $cats->id], ['class' => 'card category_block']) ?>
        <?php endforeach; ?>

    </div>
    <?php echo LinkPager::widget(['pagination' => $dataProvider->pagination,]); ?>


</div>
