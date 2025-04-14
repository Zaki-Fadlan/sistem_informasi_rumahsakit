<?php

class m250413_063132_tagihan extends CDbMigration
{
	public function up()
	{
	    // Tabel tagihan
		$this->createTable('tbl_tagihan', array(
			'id_tagihan' => 'pk',
			'id_kunjungan' => 'int NOT NULL',
			'total_tindakan' => 'decimal(10,2)',
			'total_obat' => 'decimal(10,2)',
			'total_bayar' => 'decimal(10,2)',
			'status_bayar' => 'boolean NOT NULL DEFAULT false'
		));
		// Menambahkan foreign key di kolom id_kunjungan yang mengarah ke tabel tbl_kunjungan
		$this->addForeignKey(
			'fk_tagihan_kunjungan', 
			'tbl_tagihan', 
			'id_kunjungan', 
			'tbl_kunjungan', 
			'id_kunjungan', 
			'CASCADE', 
			'CASCADE'  
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_tagihan_kunjungan', 'tbl_tagihan');
		$this->dropTable('tbl_tagihan');
	}
}