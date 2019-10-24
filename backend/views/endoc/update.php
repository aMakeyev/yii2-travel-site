<?php

use yii\helpers\Html;
use mihaildev\elfinder\InputFile;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/*$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rudocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="rudoc-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="rudoc-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'file')->widget(InputFile::className(), [
			'language'      => 'ru',
			'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
			'path' 			=> 'docs', // будет открыта папка из настроек контроллера с добавлением указанной под деритории
			//'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
			//'dragUploadAllow'  => array('doc'),

			'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
			'options'       => ['class' => 'form-control'],
			'buttonOptions' => ['class' => 'btn btn-default'],
			'multiple'      => false       // возможность выбора нескольких файлов
		]
		);?>

		<?= $form->field($model, 'status')->dropDownList([ '1' => 'На сайте', '0' => 'Черновик', ]) ?>

		<?= $form->field($model, 'doc_index')->textInput(['type' => 'number']) ?>


		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>


</div>
