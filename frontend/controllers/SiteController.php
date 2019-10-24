<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()

    {
		$ip = Yii::$app->geoip->ip(); // current user ip
		//$ip = Yii::$app->geoip->ip("95.25.195.172");
		if($ip->country == 'Russia')
			return $this->redirect('/ru');
        return $this->redirect('/en');
    }


}
