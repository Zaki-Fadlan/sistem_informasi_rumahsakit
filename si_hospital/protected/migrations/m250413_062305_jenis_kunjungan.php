<?php

class m250413_062305_jenis_kunjungan extends CDbMigration
{
	public function up()
	{
		// Tabel jenis kunjungan
		$this->createTable('tbl_jenis_kunjungan', array(
			'id_jenis_kunjungan' => 'pk',
			'nama_jenis' => 'varchar(100) NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('tbl_jenis_kunjungan');

		return false;
	}
}