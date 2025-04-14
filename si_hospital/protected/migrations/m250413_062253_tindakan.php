<?php

class m250413_062253_tindakan extends CDbMigration
{
	public function up()
	{
		// Tabel tindakan
		$this->createTable('tbl_tindakan', array(
        	'id_tindakan' => 'pk',
        	'nama_tindakan' => 'varchar(100) NOT NULL',
        	'deskripsi' => 'text',
        	'biaya' => 'decimal(10,2)',
        ));

	}

	public function down()
	{
		$this->dropTable('tbl_tindakan');

		return false;
	}
}