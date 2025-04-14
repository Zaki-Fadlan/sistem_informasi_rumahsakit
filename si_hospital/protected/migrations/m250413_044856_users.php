<?php

class m250413_044856_users extends CDbMigration
{
	public function up()
	{
	    // Tabel users
		$this->createTable('tbl_users', array(
			'id_users' => 'pk',
			'id_karyawan' => 'int NOT NULL',
			'username' => 'varchar(50) NOT NULL',
			'password' => 'varchar(255) NOT NULL',
			'status' => 'boolean NOT NULL DEFAULT true',
			'created_at' => 'date NOT NULL',
		));
		// Menambahkan foreign key yang menghubungkan id_karyawan di tbl_users ke id_karyawan di tbl_karyawan
		$this->addForeignKey(
			'fk_users_karyawan', 
			'tbl_users', 
			'id_karyawan', 
			'tbl_karyawan',
			'id_karyawan', 
			'CASCADE',
			'CASCADE' 
		);
		
		// Menambahkan constraint UNIQUE untuk memastikan relasi One-to-One
		$this->createIndex('idx_unique_id_karyawan', 'tbl_users', 'id_karyawan', true); // Menambahkan indeks unik pada id_karyawan
			
	}

	public function down()
	{
		// Drop foreign key dan index
		$this->dropForeignKey('fk_users_karyawan', 'tbl_users');
		$this->dropIndex('idx_unique_id_karyawan', 'tbl_users');
		$this->dropTable('tbl_users');
	}

}