<?php

class m250414_082518_seedresepobat extends CDbMigration
{
    public function up()
    {
        $dosisOptions = [
            "1x1 setelah makan",
            "2x1 sebelum makan",
            "3x1 pagi, siang, malam",
            "1x2 setelah makan malam",
            "2x2 setiap 8 jam",
            "1x1 sebelum tidur"
        ];

        // Seed 40 data resep obat
        for ($i = 0; $i < 40; $i++) {
            $idDokter = rand(1, 5);
            $idKunjungan = rand(1, 20);
            $idObat = rand(1, 500);
            $jumlah = rand(1, 3);
            $dosis = $dosisOptions[array_rand($dosisOptions)];

            $this->insert('tbl_resep_obat', [
                'id_dokter' => $idDokter,
                'id_kunjungan' => $idKunjungan,
                'id_obat' => $idObat,
                'jumlah' => $jumlah,
                'dosis' => $dosis,
            ]);
        }
    }

    public function down()
    {
        $this->truncateTable('tbl_resep_obat');
    }
}
