<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.03.19
 * Time: 14:50
 */

namespace frontend\controllers;

use backend\models\Rudoc;
use backend\models\Rutour;
use backend\models\Rupage;
use Yii;
use yii\web\HttpException;

class RuController extends AppController {

	public function actionIndex(){

		$this->setMeta('ISCRA Tour operator');
		$rutours = Rutour::find()->where(['status' => 1])->orderBy('order_index')->all();

		return $this->render('index', compact('rutours'));
	}

	public function actionView($route){
		$rutour = Rutour::findOne(['route' => $route]);
		if(empty($rutour))
			throw new HttpException('404', 'Данного тура не существует.');
		$rudocs = Rudoc::find()->where(['tour_id' => $rutour->id, 'status' => 1])->orderBy('doc_index')->all();
		$this->setMeta($rutour->title, $rutour->keywords, $rutour->description);

		return $this->render('view', compact('rutour', 'rudocs'));
	}

	public function actionPage($route){
		$page = Rupage::find()->where(['route' => $route, 'status' => 1])->limit(1)->one();
		if(empty($page))
			throw new HttpException('404', 'Данной страницы не существует.');

		$this->setMeta($page->title, $page->keywords, $page->description);

		return $this->render('page', compact('page'));
	}
}