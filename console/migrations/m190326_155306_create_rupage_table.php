<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rupage}}`.
 */
class m190326_155306_create_rupage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%rupage}}', [
				'id' => $this->primaryKey(),
				'route'=>$this->string(),
				'name'=>$this->string(),
				'content'=>$this->text(),
				'status' => $this->smallInteger()->notNull(),
				'top_menu' => $this->smallInteger(),
				'top_menu_index' => $this->smallInteger(),
				'bottom_menu' => $this->smallInteger(),
				'bottom_menu_index' => $this->smallInteger(),
				'title' => $this->string(),
				'keywords' => $this->string(),
				'description' => $this->string(),
				'created_at' => $this->integer()->notNull(),
				'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%rupage}}');
    }
}
