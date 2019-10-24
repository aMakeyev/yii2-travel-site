<?php

use backend\models\Rudoc;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);
?>

<?php
// bind actions
$this->registerJs('var popUp = {"id": "doc", "actions": ["update"]};', yii\web\View::POS_HEAD);

$dataProvider = new ActiveDataProvider([
	'query' => Rudoc::find()->where(['tour_id' => $model->id, 'status' => 1])->orderBy('doc_index'),
]);
?>
<?= Modal::widget([
	'id' => 'doc-win',
	'size' => 'modal-lg',
	'toggleButton' => false,
])
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
	<?= '<p><b>Документы, туры и пр.</b></p>'?>
	<p>
		<?= Html::a('Добавить документ', ['/rudoc/create', 'tour_id' => $model->id], [
			'id' => 'doc-add',
			//'data-id' => $model->id,
			'data-toggle' => 'modal',
			'data-target' => '#doc-win',
			'class' => 'btn btn-success',
		]) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			//'id',
			//'tour_id',
			'doc_index',
			'name',
			'price',
			//'link',
			'file',
			/*[
					'attribute' => 'file',
					'headerOptions' => ['style' => 'word-wrap:break-word'],
			],*/
			[
				'attribute' => 'status',
				'value' => function($data){
					return !$data->status ? '<span class="text-danger">Черновик</span>' : '<span class="text-success">На сайте</span>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
			],
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
			],
			// update, delete actions
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',
				'buttons' => [
					'update' => function ($url, $model) {
						return
							Html::a(
							'<span class="glyphicon glyphicon-pencil"></span>',
								['/rudoc/update', 'id' => $model->id],
							 [
								'class' => 'update',
								'data-toggle' => 'modal',
								'data-target' => '#doc-win',
							]
						);
					},
					'delete' => function ($url, $model) {
						return
							Html::a(
								'<span class="glyphicon glyphicon-trash"></span>',
								['/rudoc/delete', 'id' => $model->id]
							);
					},
				],
			],
		],
	]); ?>
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
	<?= $form->field($model, 'order_index')->textInput(['type' => 'number']) ?>
	<?= $form->field($model, 'bottom_menu')->dropDownList([ '1' => 'Включить', '0' => 'Исключить', ]) ?>
	<?= $form->field($model, 'bottom_menu_index')->textInput(['type' => 'number']) ?>
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'description')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		<?= Html::a('Открыть на сайте', '/ru/'.$model->route, ['target' => '_blank', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
