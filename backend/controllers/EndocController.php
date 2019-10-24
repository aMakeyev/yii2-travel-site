<?php

namespace backend\controllers;

use Yii;
use backend\models\Endoc;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 */
class EndocController extends Controller
{
	public $layout = 'modal';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Endoc::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tour_id)
    {
		$model = new Endoc();
		$model->tour_id = $tour_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['/en/update', 'id' => $model->tour_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/en/update', 'id' => $model->tour_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	$model = $this->findModel($id);

    	$this->findModel($id)->delete();

		return $this->redirect(['/en/update', 'id' => $model->tour_id]);
    }

    /**
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Endoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
