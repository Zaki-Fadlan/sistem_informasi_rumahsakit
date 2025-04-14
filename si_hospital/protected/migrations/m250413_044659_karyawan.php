<?php

class m250413_044659_karyawan extends CDbMigration
{
	public function up()
	{
		// Tabel karyawan
		$this->createTable('tbl_karyawan', array(
			'id_karyawan' => 'pk',
			'nama' => 'varchar(100) NOT NULL',
			'nip' => 'int NOT NULL',
			'jenis_kelamin' => 'varchar(1) NOT NULL', 
			'dob' => 'date NOT NULL',
			'kontak' => 'varchar(20)',
			'alamat' => 'text',
			'id_kabupaten' => 'int NOT NULL',
		));
		// Foreign key ke kabupaten
		$this->addForeignKey(
			'fk_karyawan_kabupaten',      // Nama constraint
			'tbl_karyawan',               // Tabel yang memiliki foreign key
			'id_kabupaten',               // Kolom yang menjadi foreign key
			'tbl_kabupaten',              // Tabel referensi
			'id_kabupaten',               // Kolom referensi
			'CASCADE',                    // ON DELETE
			'CASCADE'                     // ON UPDATE
		);
	}

	public function down()
	{
		// Drop foreign key dulu
		$this->dropForeignKey('fk_karyawan_kabupaten', 'tbl_karyawan');

		$this->dropTable('tbl_karyawan');
	}
}