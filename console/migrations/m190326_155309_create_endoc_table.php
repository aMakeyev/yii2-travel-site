<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enpage}}`.
 */
class m190326_155309_create_endoc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%endoc}}', [
				'id' => $this->primaryKey(),
				'tour_id' => $this->integer()->notNull(),
				'name'=>$this->string(),
				'price'=>$this->string(),
				'link'=>$this->string(),
				'file'=>$this->string(),
				'status' => $this->smallInteger()->notNull(),
				'doc_index' => $this->smallInteger(),
				'created_at' => $this->integer()->notNull(),
				'updated_at' => $this->integer()->notNull(),
        ]);
		$this->createIndex('{{%idx-endoc-tour_id}}', '{{%endoc}}', 'tour_id');

		$this->addForeignKey('{{%fk-endoc-tour_id}}', '{{%endoc}}', 'tour_id', '{{%entour}}', 'id', 'CASCADE');


	}

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%endoc}}');
    }
}
