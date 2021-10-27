<?php

/**
 * Вывод одной книги
 */

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $book app\models\Book */
$this->title = $book->title;


\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <div class="card mb-3" style="width: 100%">
        <div class="row g-0">
            <div class="col-2">
                <img src="<?= $book->thumbnailUrl ?>" alt="<?= $book->title ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?= $book->title ?></h3>
                    <p class="card-text"><small class="text-muted">isbn: <?= $book->isbn ?></small></p>
                    <hr>


                    <?php foreach ($book->authors as $author) : ?>
                        <h5><?= $author->title ?></h5>
                    <?php endforeach; ?>

                    <p class="card-text"><?= $book->longDescription ?></p>

                    <h5 class="card-title">Категории:</h5>


                    <?php foreach ($book->categories as $cat) :
                        $catUrl = Url::to(['category/view', 'id' => $cat['id']]); ?>
                        <a href="<?= $catUrl ?>"><h5><?= $cat->title ?></h5></a>
                    <?php endforeach; ?>
                    <p class="card-text"><small class="text-muted">Страниц: <?= $book->pageCount ?></small></p>
                </div>
            </div>
        </div>
    </div>


</div>
