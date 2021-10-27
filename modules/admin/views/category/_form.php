<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


//$categories = ArrayHelper::map($categories,'id',$model->id);


/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */


$cats = Category::find()->where(['and',
    ['<>', 'id', $model->id],
])->all();
$categories = ArrayHelper::map($cats,'id','title');
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->dropDownList(
        $categories)->label('Выберите родителя') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
