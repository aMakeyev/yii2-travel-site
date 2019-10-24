<?php

use yii\db\Migration;


class m170124_021553_create_entour_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('entour', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
			'link'=>$this->string(),
			'description'=>$this->text(),
            'content'=>$this->text(),
			'status' => $this->smallInteger()->notNull(),
			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rutour');
    }
}
