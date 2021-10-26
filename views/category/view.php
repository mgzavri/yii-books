<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $children app\models\Category */

$this->title = $model['title'];
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?
if (!empty($children)){ ?>
<div class="d-flex justify-content-between flex-wrap">

        <?php foreach ($children as $cats) : ?>
    <div class="card category_block" >
        <div class="card-body">
            <h5 class="card-title"><?= $cats['title']; ?></h5>
            <?= Html::a('В категорию', ['category/view', 'id' => $cats['id']], ['class' => 'btn btn-primary']) ?>

        </div>
    </div>
    <?php endforeach; ?>

</div>
    <?php }



/*foreach($children as $cat) {
    echo '<br>вложенные категории<br>';
    echo $cat['title'];
    echo '<br>_________________________<br>';
}

foreach ($model as $row) {
    echo '<b>'.strtoupper($row->title).'<b>';
    echo '<br>_________________________<br>';

    foreach($row->books as $book) {

        echo $book->title;
        echo '<br>_________________________<br>';
    }

}*/
?>

</div>
