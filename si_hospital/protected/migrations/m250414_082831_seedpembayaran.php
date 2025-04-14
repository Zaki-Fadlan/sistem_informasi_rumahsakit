<?php

class m250414_082831_seedpembayaran extends CDbMigration
{
	public function up()
    {
       // Ambil jumlah data tagihan
	   $jumlahTagihan = Yii::app()->db->createCommand()
	   ->select('COUNT(*)')
	   ->from('tbl_tagihan')
	   ->queryScalar();

   // Misalnya kita ingin seed sebanyak 50 pembayaran
   for ($i = 0; $i < 50; $i++) {
	   $idKasir = rand(1, 5);
	   $idTagihan = rand(1, $jumlahTagihan); // Sesuai jumlah tagihan
	   $tanggalBayar = '2024-04-' . str_pad(rand(1, 30), 2, '0', STR_PAD_LEFT);
	   $jumlahDibayar = rand(50000, 500000); // Bebas antara 50rb - 500rb

	   $this->insert('tbl_pembayaran', [
		   'id_kasir' => $idKasir,
		   'id_tagihan' => $idTagihan,
		   'tanggal_bayar' => $tanggalBayar,
		   'jumlah_dibayar' => $jumlahDibayar
	   ]);
   }
    }

    public function down()
    {
        $this->truncateTable('tbl_pembayaran');
    }
}