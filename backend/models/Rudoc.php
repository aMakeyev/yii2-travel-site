<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rudoc".
 *
 * @property int $id
 * @property int $tour_id
 * @property string $name
 * @property double $price
 * @property string $link
 * @property string $file
 * @property int $status
 * @property int $doc_index
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Rutour $tour
 */
class Rudoc extends ActiveRecord
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
        return 'rudoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tour_id', 'status'], 'required'],
            [['tour_id', 'status', 'doc_index', 'created_at', 'updated_at'], 'integer'],
            [['name', 'link', 'file','price'], 'string', 'max' => 255],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rutour::className(), 'targetAttribute' => ['tour_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
			'id' => 'ID',
			'tour_id' => 'ID раздела',
			'name' => 'Название документа (тура, программы и т.п.)',
			'price' => 'Стоимость',
			'link' => 'Текст ссылки на документ',
			'file' => 'Файл документа',
			'status' => 'Статус',
			'doc_index' => 'Порядковый номер в списке',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getTour()
    {
        return $this->hasOne(Rutour::className(), ['id' => 'tour_id']);
    }*/
}
