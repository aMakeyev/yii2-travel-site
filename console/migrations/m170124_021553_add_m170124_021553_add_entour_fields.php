<?php

use yii\db\Migration;

class m170124_021553_add_m170124_021553_add_entour_fields extends Migration
{
    public function up()
    {
		$this->addColumn('{{%entour}}', 'route', $this->string());
		$this->addColumn('{{%entour}}', 'bottom_menu', $this->smallInteger());
        $this->addColumn('{{%entour}}', 'bottom_menu_index', $this->smallInteger());
        $this->addColumn('{{%entour}}', 'title', $this->string());
        $this->addColumn('{{%entour}}', 'keywords', $this->string());
        $this->addColumn('{{%entour}}', 'description', $this->string());

    }

    public function down()
    {
		$this->dropColumn('{{%entour}}', 'route');
        $this->dropColumn('{{%entour}}', 'bottom_menu');
        $this->dropColumn('{{%entour}}', 'bottom_menu_index');
        $this->dropColumn('{{%entour}}', 'title');
        $this->dropColumn('{{%entour}}', 'keywords');
        $this->dropColumn('{{%entour}}', 'description');
    }
}
