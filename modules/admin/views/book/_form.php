<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Author;
use \app\models\Category;


$authors = Author::find()->All();
$authors = ArrayHelper::map($authors,'id','title');
$categories = Category::find()->All();
$categories = ArrayHelper::map($categories,'id','title');


/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isbn')->textInput() ?>

    <?= $form->field($model, 'pageCount')->textInput() ?>

    <?= $form->field($model, 'publishedDate')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'thumbnailUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authors')->dropDownList(
        $authors
,[
       'multiple' => 'multiple'
    ])->label('Select author') ?>

    <?= $form->field($model, 'categories')->dropDownList(
        $categories
        ,[
        'multiple' => 'multiple'
    ])->label('Select category') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
