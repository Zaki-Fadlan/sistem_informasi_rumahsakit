<?php

class m250413_043932_kabupaten extends CDbMigration
{
	public function up()
	{
		// Tabel kabupaten
		$this->createTable('tbl_kabupaten', array(
			'id_kabupaten' => 'pk',
			'nama_kabupaten' => 'varchar(100) NOT NULL',
			'id_provinsi' => 'int NOT NULL',
		));
		// Menambahkan foreign key yang menghubungkan id_provinsi di tbl_kabupaten ke id_provinsi di tbl_provinsi
		$this->addForeignKey(
			'fk_kabupaten_provinsi', // Nama constraint
			'tbl_kabupaten', // Tabel yang memiliki foreign key
			'id_provinsi', // Kolom yang menjadi foreign key
			'tbl_provinsi', // Tabel yang menjadi referensi
			'id_provinsi', // Kolom di tabel referensi
			'CASCADE', // Aksi saat data dihapus di tabel referensi
			'CASCADE'  // Aksi saat data diubah di tabel referensi
		);
	}

	public function down()
	{
		// Drop foreign key
		$this->dropForeignKey('fk_kabupaten_provinsi', 'tbl_kabupaten');

		// Drop tabel kabupaten
		$this->dropTable('tbl_kabupaten');

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}