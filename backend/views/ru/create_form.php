<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);
?>


<div class="rutour-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

	<?php
	echo $form->field($model, 'list')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full'])
	]);
	?>

	<?php

	echo $form->field($model, 'content')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full'])
	]);
	?>

	<?= $form->field($model, 'image')->fileInput() ?>
	<?php $img = $model->getImage();?>
	<?= "<p><img src='{$img->getUrl('x120')}'></p>" ?>

	<?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
	<?php $imgs = $model->getImages();
	foreach($imgs as $img){
		echo "<div class='text-center float-left''><img src='{$img->getUrl('x120')}'><br>";
		echo Html::a('Удалить', ['deleteimage', 'id' => $model->id, 'imgId' => $img->id], [
				'class' => 'text-danger',
				'data' => [
					'method' => 'post',
				],
			]) . '</div>';
	}?>
	<div class="clearfix"></div>

	<?= $form->field($model, 'status')->dropDownList([ '1' => 'На сайте', '0' => 'Черновик', ]) ?>
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
