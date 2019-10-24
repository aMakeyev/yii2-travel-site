<?php
namespace backend\controllers;


use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends AppAdminController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
		$this->layout = 'close';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	    public function actionSignup()
	    {
	        $model = new User();
	        if ($model->load(Yii::$app->request->post())) {
	            if ($user = $model->signup()) {
	                if (Yii::$app->getUser()->login($user)) {
	                    return $this->goHome();
	                }
	            }
	        }

	        return $this->render('signup', [
	            'model' => $model,
	        ]);
	    }

	public function actionRequestPasswordReset()
	{
		$this->layout = 'close';

		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->goHome();
			} else {
				Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
			}
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword($token)
	{
		$this->layout = 'close';

		try {
			$model = new ResetPasswordForm($token);
		} catch (InvalidParamException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
			Yii::$app->session->setFlash('success', 'New password saved.');

			return $this->goHome();
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
	}
}
