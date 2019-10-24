<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
			'username',
			//'auth_key',
			//'password_hash',
			//'password_reset_token',
			'email:email',
			[
				'attribute' => 'status',
				'value' => function($data){
					return !$data->status ? '<span class="text-danger">Не активен</span>' : '<span class="text-success">Активен</span>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'role',
				'value' => function($data){
					return $data->role == 20 ? '<span class="text-success">Менеджер</span>' : '<span class="text-danger">Админ</span>';
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
    ]) ?>

</div>
