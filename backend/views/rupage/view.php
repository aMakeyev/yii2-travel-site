<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rupage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статичные страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rupage-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Открыть на сайте', '/ru/page/'.$model->route, ['target' => '_blank', 'class' => 'btn btn-success']) ?>
        <?= Html::a('Рекактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'name',
            'route',
			[
				'attribute' => 'content',
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
				'attribute' => 'top_menu',
				'value' => function($data){
					return !$data->top_menu ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Включено</span>';
				},
				'format' => 'html',
			],
			'top_menu_index',
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

</div>
