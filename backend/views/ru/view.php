<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Rudoc;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

?>
<?php
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Разделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$dataProvider = new ActiveDataProvider([
	'query' => Rudoc::find()->where(['tour_id' => $model->id, 'status' => 1])->orderBy('doc_index'),
]);
?>

<div class="rutour-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Открыть на сайте', '/ru/'.$model->route, ['target' => '_blank', 'class' => 'btn btn-success']) ?>
		<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Вы уверены, что хотите удалить раздел?',
				'method' => 'post',
			],
		]) ?>
	</p>
	<?php $img = $model->getImage();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			//'id',
			'name',
			'route',
            'link',
			[
				'attribute' => 'list',
				'format' => 'html',
			],
            //'content:ntext',
			[
				'attribute' => 'content',
				'format' => 'html',
			],
			[
				'attribute' => 'image',
				'value' => "<img src='{$img->getUrl('x120')}'>",
				'format' => 'html',
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return !$data->status ? '<span class="text-danger">Черновик</span>' : '<span class="text-success">На сайте</span>';
				},
				'format' => 'html',
			],
			'order_index',
			[
				'attribute' => 'bottom_menu',
				'value' => function($data){
					return !$data->bottom_menu ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Включено</span>';
				},
				'format' => 'html',
			],
			'bottom_menu_index',
			'title',
			'keywords',
			'description',
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
			],
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
			],
        ],
    ]) ?>
	<?= '<p><b>Документы, туры и пр.</b></p>'?>
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
		],
	])?>

</div>
