<?php

use yii\db\Migration;

class m170124_021553_add_m170124_021553_add_rutour_fields extends Migration
{
    public function up()
    {
		$this->addColumn('{{%rutour}}', 'route', $this->string());
		$this->addColumn('{{%rutour}}', 'bottom_menu', $this->smallInteger());
        $this->addColumn('{{%rutour}}', 'bottom_menu_index', $this->smallInteger());
        $this->addColumn('{{%rutour}}', 'title', $this->string());
        $this->addColumn('{{%rutour}}', 'keywords', $this->string());
        $this->addColumn('{{%rutour}}', 'description', $this->string());

    }

    public function down()
    {
		$this->dropColumn('{{%rutour}}', 'route');
        $this->dropColumn('{{%rutour}}', 'bottom_menu');
        $this->dropColumn('{{%rutour}}', 'bottom_menu_index');
        $this->dropColumn('{{%rutour}}', 'title');
        $this->dropColumn('{{%rutour}}', 'keywords');
        $this->dropColumn('{{%rutour}}', 'description');
    }
}
