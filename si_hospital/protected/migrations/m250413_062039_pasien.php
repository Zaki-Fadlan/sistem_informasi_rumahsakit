<?php

class m250413_062039_pasien extends CDbMigration
{
	public function up()
	{
		// Tabel pasien
		$this->createTable('tbl_pasien', array(
			'id_pasien' => 'pk',
			'nama_lengkap' => 'varchar(100) NOT NULL',
			'nik' => 'varchar(20)',
			'dob' => 'date NOT NULL',
			'jenis_kelamin' => 'varchar(1) NOT NULL',
			'alamat' => 'text',
			'id_kabupaten' => 'int',
			'no_hp' => 'varchar(20)',
			'tanggal_daftar' => 'date NOT NULL',
		));
		// Tambahkan foreign key dari pasien ke kabupaten
		$this->addForeignKey(
			'fk_pasien_kabupaten',   
			'tbl_pasien',             
			'id_kabupaten',           
			'tbl_kabupaten',         
			'id_kabupaten',         
			'SET NULL',               // ON DELETE → kalau kabupaten dihapus, id_kabupaten jadi NULL
			'CASCADE'                 
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_pasien_kabupaten', 'tbl_pasien');
		$this->dropTable('tbl_pasien');

		return false;
	}
}