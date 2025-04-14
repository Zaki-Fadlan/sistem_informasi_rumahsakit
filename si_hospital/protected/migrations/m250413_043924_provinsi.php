<?php

class m250413_043924_provinsi extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_provinsi', array(
            'id_provinsi' => 'pk',
            'nama_provinsi' => 'varchar(100) NOT NULL',
        ));
	}

	public function down()
	{
		$this->dropTable('tbl_provinsi');
	}

}