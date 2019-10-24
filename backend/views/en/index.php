<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entour-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать раздел', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			//'id',
			'name',
			[
				'attribute' => 'route',
				'value' => function($data){
					return 	Html::a($data->route, '/en/' . $data->route, ['target' => '_blank']);
				},
				'format' => 'raw',
			],
			'link',
			[
				'attribute' => 'list',
				'format' => 'html',
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return !$data->status ? '<span class="text-danger">Черновик</span>' : '<span class="text-success">На сайте</span>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'bottom_menu',
				'value' => function($data){
					return !$data->bottom_menu ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Включено</span>';
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
