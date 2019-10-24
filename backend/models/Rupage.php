<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rupage".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Rupage extends \yii\db\ActiveRecord
{
	public function behaviors()
	{
		return [

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
        return 'rupage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content','description'], 'string'],
            [['status','route','name'], 'required'],
            [['status', 'created_at', 'updated_at','top_menu','top_menu_index','bottom_menu','bottom_menu_index',], 'integer'],
            [['title','route','title','keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
		return [
			'id' => 'ID страницы',
			'route' => 'Url',
			'name' => 'Заголовок',
			'content' => 'Контент',
			'status' => 'Статус',
			'top_menu' => 'Верхнее меню',
			'top_menu_index' => 'Порядковый номер в верх.меню',
			'bottom_menu' => 'Нижнее меню',
			'bottom_menu_index' => 'Порядковый номер в ниж.меню',
			'title' => 'title',
			'keywords' => 'keywords',
			'description' => 'description',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
		];
    }
}
