<?php

class m250414_081106_seedkunjungan extends CDbMigration
{
    public function up()
    {
        // Data keluhan dummy
        $keluhanDummy = [
            'Sakit kepala', 'Pusing', 'Demam', 'Batuk', 'Flu', 
            'Nyeri sendi', 'Mual', 'Sakit perut', 'Sesak napas', 'Lemas', 
            'Tidak nafsu makan', 'Sakit tenggorokan', 'Sakit punggung', 'Mata merah', 'Gatal-gatal',
            'Telinga berdengung', 'Nyeri dada', 'Pusing setelah berdiri', 'Sakit gigi', 'Mudah lelah'
        ];

        // Loop untuk memasukkan 20 data kunjungan
        for ($i = 0; $i < 20; $i++) {
            // Generate data kunjungan acak
            $idPetugas = rand(1, 5); // id_petugas antara 1 dan 5
            $idPasien = rand(1, 20); // id_pasien antara 1 dan 20
            $tanggalKunjungan = date('Y-m-d', strtotime('-' . rand(1, 30) . ' days')); // Tanggal kunjungan acak antara 1 hingga 30 hari yang lalu
            $idJenisKunjungan = rand(1, 10) > 3 ? rand(1, 10) : null; // id_jenis_kunjungan antara 1 dan 10, bisa null (misalnya 30% chance)
            $keluhan = $keluhanDummy[$i]; // Pilih keluhan dari array keluhanDummy

            // Insert data kunjungan
            $this->insert('tbl_kunjungan', [
                'id_petugas' => $idPetugas,
                'id_pasien' => $idPasien,
                'tanggal_kunjungan' => $tanggalKunjungan,
                'id_jenis_kunjungan' => $idJenisKunjungan,
                'keluhan' => $keluhan,
            ]);
        }
    }

    public function down()
    {
        // Menghapus semua data dari tabel tbl_kunjungan
        $this->truncateTable('tbl_kunjungan');
    }
}
