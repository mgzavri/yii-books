<?php
/**
 * Вывод одной категории с книгами и подкатегориями, если есть
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $books app\models\Category */
/* @var $children app\models\Category */
/* @var $title app\models\Category */


$this->title = $title;

\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1>Книги в категории <?= Html::encode($this->title) ?></h1>
    <?php

 if (!empty($children)) { ?>
     <h3>Подкатегории</h3>
    <div class="d-flex justify-content-between flex-wrap">
        <?php foreach ($children as $cat) :
            $url = Url::to(['category/view', 'id' => $cat['id'] ]);?>

            <div class="category">
                <a href="<?= $url ?>">
                    <div class="category_img"></div>
                </a>
                <h5 class="card-title"><?= $cat['title'] ?></h5>
                <div class="catfooter">

                </div>
            </div>
        <?php endforeach;

        ?>

    </div>

    <?php } ?>






<?php if (!empty($books->getModels())) {?>



    <div class="row row-cols-4 g-4 items_container">


        <?php foreach ($books->getModels() as $book) :
            $url = Url::to(['book/view', 'id' => $book['id']]);
            $img = $book->thumbnailUrl ?? '/assets/images/book.jpg';
            ?>
            <div class="col">
                <div class="card h-100 m-1">
                    <a href="<?= $url ?>"><img src="<?= $img ?>" class="card-img-top" alt="<?= $book->title ?>"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $book->title ?></h5>
                        <p class="card-text"><?= substr($book->shortDescription, 0, 100) ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><?= date('Y', strtotime($book->publishedDate)) ?> г.</small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <hr />
    <?php echo LinkPager::widget(['pagination' => $books->pagination,]); ?>
    <hr />

<?php } else {
    echo 'В этой категории книг нет';
} ?>


</div>
