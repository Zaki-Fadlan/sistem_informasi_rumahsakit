<?php

class m250413_063142_pembayaran extends CDbMigration
{
	public function up()
	{
		// Tabel pembayaran
		$this->createTable('tbl_pembayaran', array(
			'id_pembayaran' => 'pk',
			'id_kasir' => 'int NOT NULL',
			'id_tagihan' => 'int NOT NULL',     
			'tanggal_bayar' => 'date NOT NULL',
			'jumlah_dibayar' => 'decimal(10,2)',
		));
		// Foreign key dari id_kasir ke tbl_users
		$this->addForeignKey(
			'fk_pembayaran_kasir',      
			'tbl_pembayaran',           
			'id_kasir',                  
			'tbl_users',                
			'id_users',                  
			'CASCADE',                  
			'CASCADE'                   
		);
		// Foreign key dari id_tagihan ke tbl_tagihan (1 tagihan bisa punya banyak pembayaran)
		$this->addForeignKey(
			'fk_pembayaran_tagihan',
			'tbl_pembayaran',
			'id_tagihan',
			'tbl_tagihan',
			'id_tagihan',
			'CASCADE',
			'CASCADE'
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_pembayaran_tagihan', 'tbl_pembayaran');
		$this->dropForeignKey('fk_pembayaran_kasir', 'tbl_pembayaran');
		$this->dropTable('tbl_pembayaran');
	}
}