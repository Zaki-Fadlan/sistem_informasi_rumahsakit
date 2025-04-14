<?php

class m250414_082806_seedtagihan extends CDbMigration
{
	public function up()
    {
        // Ambil semua id_kunjungan
        $kunjunganIds = Yii::app()->db->createCommand()
            ->select('id_kunjungan')
            ->from('tbl_kunjungan')
            ->queryColumn();

        foreach ($kunjunganIds as $idKunjungan) {
            // Nilai random
            $totalTindakan = rand(10000, 200000);
            $totalObat = rand(5000, 100000);
            $totalBayar = $totalTindakan + $totalObat;
            $statusBayar = rand(0, 1); // false atau true

            // Insert ke tabel
            $this->insert('tbl_tagihan', [
                'id_kunjungan' => $idKunjungan,
                'total_tindakan' => $totalTindakan,
                'total_obat' => $totalObat,
                'total_bayar' => $totalBayar,
                'status_bayar' => $statusBayar
            ]);
        }
    }

    public function down()
    {
        $this->truncateTable('tbl_tagihan');
    }
}
