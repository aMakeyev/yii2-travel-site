<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
