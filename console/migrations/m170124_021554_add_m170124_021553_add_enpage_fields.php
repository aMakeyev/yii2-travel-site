<?php

use yii\db\Migration;

class m170124_021554_add_m170124_021553_add_enpage_fields extends Migration
{
    public function up()
    {
		$this->addColumn('{{%enpage}}', 'top_menu', $this->smallInteger());
        $this->addColumn('{{%enpage}}', 'top_menu_index', $this->smallInteger());
		$this->addColumn('{{%enpage}}', 'bottom_menu', $this->smallInteger());
		$this->addColumn('{{%enpage}}', 'bottom_menu_index', $this->smallInteger());
        $this->addColumn('{{%enpage}}', 'title', $this->string());
        $this->addColumn('{{%enpage}}', 'keywords', $this->string());
        $this->addColumn('{{%enpage}}', 'description', $this->string());

    }

    public function down()
    {
		$this->dropColumn('{{%enpage}}', 'top_menu');
		$this->dropColumn('{{%enpage}}', 'top_menu_index');
        $this->dropColumn('{{%enpage}}', 'bottom_menu');
        $this->dropColumn('{{%enpage}}', 'bottom_menu_index');
        $this->dropColumn('{{%enpage}}', 'title');
        $this->dropColumn('{{%enpage}}', 'keywords');
        $this->dropColumn('{{%enpage}}', 'description');
    }
}
