<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.03.19
 * Time: 14:50
 */

namespace frontend\controllers;

use Yii;

use backend\models\Endoc;
use backend\models\Entour;
use backend\models\Enpage;
use yii\web\HttpException;

class EnController extends AppController {

	public $layout = 'en-main';

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
				//'layout' => '/frontend/views/layuots/en-main.php',
				//'view' => '@common/views/error.php',
			],
		];
	}

	public function actionIndex(){

		$this->setMeta('ISCRA Tour operator');
		$entours = Entour::find()->where(['status' => 1])->all();

		return $this->render('index', compact('entours'));
	}
	public function actionView($route){
		$entour = Entour::findOne(['route' => $route]);
		if(empty($entour))
			throw new HttpException('404', 'Данного тура не существует.');
		$endocs = Endoc::find()->where(['tour_id' => $entour->id, 'status' => 1])->orderBy('doc_index')->all();
		$this->setMeta($entour->title, $entour->keywords, $entour->description);

		return $this->render('view', compact('entour', 'endocs'));
	}

	public function actionPage($route){
		$page = Enpage::find()->where(['route' => $route, 'status' => 1])->limit(1)->one();
		if(empty($page))
			throw new HttpException('404', 'Данной страницы не существует.');

		$this->setMeta($page->title, $page->keywords, $page->description);

		return $this->render('page', compact('page'));
	}
}