<?php

class m250413_062951_resep_obat extends CDbMigration
{
	public function up()
	{
        // Tabel resep obat
        $this->createTable('tbl_resep_obat', array(
            'id_resep_obat' => 'pk',  
            'id_dokter' => 'int NOT NULL',
            'id_kunjungan' => 'int NOT NULL',  
            'id_obat' => 'int NOT NULL',
            'jumlah' => 'int',
            'dosis' => 'varchar(100)',
        ));

        // Menambahkan foreign key ke tbl_kunjungan
        $this->addForeignKey(
            'fk_resep_obat_kunjungan',          
            'tbl_resep_obat',                    
            'id_kunjungan',                    
            'tbl_kunjungan',                   
            'id_kunjungan',                  
            'CASCADE',
            'CASCADE'
        );

        // Menambahkan foreign key ke tbl_obat
        $this->addForeignKey(
            'fk_resep_obat_obat',
            'tbl_resep_obat',
            'id_obat',
            'tbl_obat',
            'id_obat',
            'CASCADE',
            'CASCADE'
        );

        // Menambahkan foreign key ke tbl_users (dokter)
        $this->addForeignKey(
            'fk_resep_obat_dokter',  
            'tbl_resep_obat',         
            'id_dokter',              
            'tbl_users',              
            'id_users',              
            'CASCADE',               
            'CASCADE'                
        );
	}

	public function down()
	{
		$this->dropForeignKey('fk_resep_obat_dokter', 'tbl_resep_obat');
		$this->dropForeignKey('fk_resep_obat_obat', 'tbl_resep_obat');
		$this->dropTable('tbl_resep_obat');

		return false;
	}
}