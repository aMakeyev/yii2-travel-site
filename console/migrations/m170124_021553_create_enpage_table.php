<?php

use yii\db\Migration;


class m170124_021553_create_enpage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('enpage', [
            'id' => $this->primaryKey(),
            'route'=>$this->string(),
            'name'=>$this->string(),
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
