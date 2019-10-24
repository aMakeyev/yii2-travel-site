<?php

namespace backend\controllers;

use Yii;
use backend\models\Entour;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class EnController extends AppAdminController
{
	public $layout = 'en-main';

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

	public function actionIndex()
	{
		$this->setMeta('ISCRA Tour operator');

		$dataProvider = new ActiveDataProvider([
			'query' => Entour::find(),
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
    public function actionCreate()
    {
        $model = new Entour();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->image = UploadedFile::getInstance($model, 'image');
			if( $model->image ){
				$model->upload();
			}
			unset($model->image);//без удаления метод выдавал фатал еррор - странно
			$model->gallery = UploadedFile::getInstances($model, 'gallery');
			$model->uploadGallery();
			Yii::$app->session->setFlash('success', "Тур {$model->title} добавлен");
            return $this->redirect(['view', 'id' => $model->id]);
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
			$model->image = UploadedFile::getInstance($model, 'image');
			if( $model->image ){
				$model->upload();
			}
			unset($model->image);//без удаления метод выдавал фатал еррор - странно
			$model->gallery = UploadedFile::getInstances($model, 'gallery');
			$model->uploadGallery();
			Yii::$app->session->setFlash('success', "Тур {$model->title} обновлен");
            return $this->redirect(['view', 'id' => $model->id]);
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
		$model->removeImages();
		$model->delete();

        return $this->redirect(['index']);
    }
	public function actionDeleteimage($id, $imgId)
	{
		$model = $this->findModel($id);
		$imgs = $model->getImages();
		foreach($imgs as $img) {
			if($img->id == $imgId )
				$model->removeImage($img);
		}
		return $this->redirect(['update', 'id' => $id]);
	}
    /**
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entour::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Данного тура не существует.');
    }
}
