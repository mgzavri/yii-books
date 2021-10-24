<?php
use yii\bootstrap4\LinkPager;
/* @var $this yii\web\View */

$this->title = 'YiiBooks';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Категории</h1>

    </div>
<div class="sort">
    <?php echo $sort->link('title');  ?>
</div>
      <div class="d-flex justify-content-between flex-wrap">

         <?php foreach ($categories as $cats) : ?>
          <div class="card m-5" style="width: 20%;">
              <div class="card-body">
                  <h5 class="card-title"><?= $cats->title; ?></h5>
                  <a href="#" class="btn btn-primary">В категорию</a>
              </div>
          </div>
          <?php endforeach; ?>

      </div>
   <?php
    echo LinkPager::widget([
    'pagination' => $pages,
    ]); ?>


</div>
