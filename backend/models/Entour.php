<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


/**
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Entour extends ActiveRecord
{
	public $image;//для загрузки одной картинки
	public $gallery;//для загрузки нескольких


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

	public static function tableName()
	{
		return 'entour';
	}

	public function rules()
	{
		return [
			[['description', 'content', 'list', 'content'], 'string'],
			[['status', 'name'], 'required'],
			[['status', 'created_at', 'updated_at','bottom_menu','bottom_menu_index'], 'integer'],
			[['title', 'route', 'keywords', 'link'], 'string', 'max' => 255],
			[['image'], 'file', 'extensions' => 'png, jpg'],
			[['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
		];
	}


	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Наименование',
			'route' => 'Url',
			'link' => 'Текст ссылки',
			'list' => 'Краткое описание',
			'content' => 'Описание',
			'image' => 'Главное фото',
			'gallery' => 'Галерея',
			'status' => 'Статус',
			'bottom_menu' => 'Нижнее меню',
			'bottom_menu_index' => 'Порядковый номер в ниж.меню',
			'title' => 'title',
			'keywords' => 'keywords',
			'description' => 'description',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
		];
	}
	public function upload(){
		if($this->validate()){
			$path = Yii::getAlias('@upload/store/') . $this->image->baseName . '.' . $this->image->extension;
			$this->image->saveAs($path);
			//die();
			$this->attachImage($path, true);
			@unlink($path);
			return true;
		}else{
			return false;
		}
	}

	public function uploadGallery(){
		if($this->validate()){
			foreach($this->gallery as $file){
				$path = Yii::getAlias('@upload/store/') . $file->baseName . '.' . $file->extension;
				$file->saveAs($path);
				$this->attachImage($path);
				@unlink($path);
			}
			return true;
		}else{
			return false;
		}
	}
}

