<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Парсинг книг из файла</h1>
<p>
    Источник данных https://gitlab.com/prog-positron/test-app-vacancy/-/raw/master/books.json
</p>
<?php $form = ActiveForm::begin() ?>


<?= $form->field($form_model, 'url') ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>

