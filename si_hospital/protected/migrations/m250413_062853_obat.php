<?php

class m250413_062853_obat extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_obat', array(
			'id_obat' => 'pk',
			'nama_obat' => 'varchar(100) NOT NULL',
			'satuan' => 'text',
			'harga_satuan' => 'decimal(10,2)',
			'stok' => 'int NOT NULL',
			'deskripsi' => 'text',
		));
	}

	public function down()
	{
		$this->dropTable('tbl_obat');

		return false;
	}
}