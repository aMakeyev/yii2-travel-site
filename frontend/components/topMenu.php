<?php

namespace frontend\components;

use yii\base\Widget;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use frontend\models\Rupage;

	$tops = Rupage::find()->where(['top_menu' => 1, 'status' => 1])->all();
		NavBar::begin([
			'options' => [
				'class' => 'navbar navbar-expand-md navbar-light main-nav col-auto'
			],
		]);
		foreach($tops as $top){
			$menuItems[] = ['label' => $top->name, 'url' => ['/ru/page', 'route' => $top->route]];
		}
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav'],
			'items' => $menuItems
		]);
		NavBar::end();
