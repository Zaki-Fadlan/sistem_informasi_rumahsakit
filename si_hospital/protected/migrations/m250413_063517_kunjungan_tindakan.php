<?php

class m250413_063517_kunjungan_tindakan extends CDbMigration
{
	public function up()
	{
        // Tabel kunjungan_tindakan
        $this->createTable('tbl_kunjungan_tindakan', array(
            'id' => 'pk',
            'id_dokter' => 'int NOT NULL',
            'id_tindakan' => 'int NOT NULL',
            'id_kunjungan' => 'int NOT NULL',
            'catatan' => 'text',
            'biaya' => 'decimal(10,2)',
        ));
		// Menambahkan foreign key ke tbl_kunjungan
		$this->addForeignKey(
			'fk_kunjungan_tindakan_kunjungan',   
			'tbl_kunjungan_tindakan',            
			'id_kunjungan',                     
			'tbl_kunjungan',                   
			'id_kunjungan',                  
			'CASCADE',                      
			'CASCADE'                    
		);
		// Tambahkan foreign key ke tbl_users (dokter)
		$this->addForeignKey(
			'fk_kunjungan_tindakan_dokter',  
			'tbl_kunjungan_tindakan',        
			'id_dokter',                     
			'tbl_users',                    
			'id_users',                     
			'CASCADE',                      
			'CASCADE'                      
		);
		// Tambahkan foreign key ke tbl_tindakan
		$this->addForeignKey(
			'fk_kunjungan_tindakan_tindakan',
			'tbl_kunjungan_tindakan',
			'id_tindakan',
			'tbl_tindakan',
			'id_tindakan',
			'CASCADE',
			'CASCADE'
		);
	}

	public function down()
	{
		// Menghapus foreign key
		$this->dropForeignKey('fk_kunjungan_tindakan_kunjungan', 'tbl_kunjungan_tindakan');
		$this->dropForeignKey('fk_kunjungan_tindakan_dokter', 'tbl_kunjungan_tindakan');
		$this->dropForeignKey('fk_kunjungan_tindakan_tindakan', 'tbl_kunjungan_tindakan');
		$this->dropTable('tbl_kunjungan_tindakan');

		return false;
	}
}