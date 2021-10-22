<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the Book page. You may modify the following file to customize its content:
    </p>
    <?php
  //  echo 'title '.$books->title.'<br />';
    echo 'cat ';
  //  echo $books->category[0]['title'];
    echo '<br />';
foreach ($books as $book){
    echo $book->title.'<br />';
    echo $book->category[0]->title.'<br />';
}

    ?>

</div>
