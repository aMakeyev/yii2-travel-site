<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $role
 * @property int $created_at
 * @property int $updated_at
 */
class UserUpdate extends ActiveRecord
{
	public $password;

	public function behaviors()
	{
		return [
			'image' => [
				'class' => 'rico\yii2images\behaviors\ImageBehave',
			],
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
				],
				'value' => function() { return date('U'); },// unix timestamp
			],
		];
	}
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

			['username', 'trim'],
			['username', 'required'],
			//['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			//['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

			//['password', 'required'],
			['password', 'string', 'min' => 6],

			[['status', 'role', 'created_at', 'updated_at'], 'integer'],

		];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Статус',
            'role' => 'Доступ',
            'created_at' => 'Дата регистрации',
            'updated_at' => 'Дата обновления',
        ];
    }


	/*public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$user = new \common\models\User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->role = $this->role;
		$user->status = $this->status;

		return $user->save() ? $user : null;
	}*/
}
