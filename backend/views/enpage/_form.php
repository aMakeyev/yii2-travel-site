<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);


/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rupage-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'content')->widget(CKEditor::className(), [
			'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full'])]) ?>

	<?= $form->field($model, 'status')->dropDownList([ '1' => 'На сайте', '0' => 'Черновик', ]) ?>
	<?= $form->field($model, 'top_menu')->dropDownList([ '1' => 'Включить', '0' => 'Исключить', ]) ?>
	<?= $form->field($model, 'top_menu_index')->textInput(['type' => 'number']) ?>
	<?= $form->field($model, 'bottom_menu')->dropDownList([ '1' => 'Включить', '0' => 'Исключить', ]) ?>
	<?= $form->field($model, 'bottom_menu_index')->textInput(['type' => 'number']) ?>
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'description')->textInput() ?>

    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
