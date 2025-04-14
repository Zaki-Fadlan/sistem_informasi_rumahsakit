<?php

class m250414_082144_seedkunjungan_tindakan extends CDbMigration
{
    public function up()
    {
        // Data tindakan dan biaya sesuai data referensi
        $tindakanList = [
            1 => 50000,
            2 => 70000,
            3 => 100000,
            4 => 85000,
            5 => 60000,
            6 => 30000,
            7 => 90000,
            8 => 150000,
            9 => 40000,
            10 => 80000,
        ];

        // Catatan dummy
        $catatanDummy = [
            'Pasien kooperatif.',
            'Tindakan dilakukan tanpa komplikasi.',
            'Pasien perlu kontrol ulang minggu depan.',
            'Tidak ditemukan kelainan lanjutan.',
            'Perlu tindak lanjut tambahan.',
            'Pasien diberikan resep lanjutan.',
            'Tindakan berhasil dilakukan.',
            'Pasien mengeluhkan nyeri ringan.',
            'Perlu observasi lebih lanjut.',
            'Saran untuk pemeriksaan lanjutan.'
        ];

        // Seed 30 data kunjungan_tindakan secara acak
        for ($i = 0; $i < 30; $i++) {
            $idDokter = rand(1, 5);
            $idKunjungan = rand(1, 20);
            $idTindakan = rand(1, 10);
            $catatan = $catatanDummy[array_rand($catatanDummy)];
            $biaya = $tindakanList[$idTindakan];

            $this->insert('tbl_kunjungan_tindakan', [
                'id_dokter' => $idDokter,
                'id_tindakan' => $idTindakan,
                'id_kunjungan' => $idKunjungan,
                'catatan' => $catatan,
                'biaya' => $biaya,
            ]);
        }
    }

    public function down()
    {
        $this->truncateTable('tbl_kunjungan_tindakan');
    }
}
