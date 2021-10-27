<?php
/**
 * Вывод списка корневых категорий
 */

use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pages app\models\Category */


?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Категории</h1>

    </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <!--<div class="sort">
        <?php /*echo $sort->link('title');  */ ?>
    </div>-->


      <?php  if (!empty($dataProvider->getModels())) { ?>
          <div class="d-flex justify-content-between flex-wrap">
            <?php foreach ($dataProvider->getModels() as $cat) :
                $url = Url::to(['category/view', 'id' => $cat['id'] ]);?>

                <div class="category">
                    <a href="<?= $url ?>">
                        <div class="category_img"></div>
                    </a>
                    <h5 class="card-title"><?= $cat->title ?></h5>
                    <div class="catfooter">
                        <p class="card-text"><small class="text-muted">Книг в категории: <?= sizeof($cat->books)?></small></p>
                    </div>
                </div>
            <?php endforeach;

            ?>

    </div>

<?php echo LinkPager::widget(['pagination' => $dataProvider->pagination,]); ?>
<?php } ?>


</div>
