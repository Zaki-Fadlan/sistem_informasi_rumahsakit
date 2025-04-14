<?php

class m250413_062717_kunjungan extends CDbMigration
{
	public function up()
	{
	    // Tabel kunjungan
		$this->createTable('tbl_kunjungan', array(
			'id_kunjungan' => 'pk',
			'id_petugas' => 'int',
			'id_pasien' => 'int NOT NULL',
			'tanggal_kunjungan' => 'date',
			'id_jenis_kunjungan' => 'int',
			'keluhan' => 'text',
		));
		$this->addForeignKey(
			'fk_kunjungan_petugas',   
			'tbl_kunjungan',          
			'id_petugas',             
			'tbl_users',             
			'id_users',               
			'CASCADE',                
			'CASCADE'                 
		);
		$this->addForeignKey(
			'fk_kunjungan_pasien',
			'tbl_kunjungan',
			'id_pasien',
			'tbl_pasien',
			'id_pasien',
			'CASCADE',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_kunjungan_jenis',            
			'tbl_kunjungan',                
			'id_jenis_kunjungan',           
			'tbl_jenis_kunjungan',        
			'id_jenis_kunjungan',     
			'CASCADE',
			'CASCADE'
		);
		
	}

	public function down()
	{
		$this->dropForeignKey('fk_kunjungan_petugas', 'tbl_kunjungan');
		$this->dropForeignKey('fk_kunjungan_pasien', 'tbl_kunjungan'); 
		$this->dropForeignKey('fk_kunjungan_jenis', 'tbl_kunjungan');
		$this->dropTable('tbl_kunjungan');

		return false;
	}
}