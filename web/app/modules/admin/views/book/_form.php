<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isbn')->textInput() ?>

    <?= $form->field($model, 'pageCount')->textInput() ?>

    <?= $form->field($model, 'publishedDate')->textInput() ?>

    <?= $form->field($model, 'thumbnailUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
