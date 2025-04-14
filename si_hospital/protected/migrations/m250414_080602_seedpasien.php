<?php

class m250414_080602_seedpasien extends CDbMigration
{
	public function up()
    {
        // Data dummy untuk nama pasien
        $namaPasien = [
            'John Doe', 'Jane Smith', 'Robert Brown', 'Emily White', 'Michael Johnson',
            'Sarah Davis', 'David Wilson', 'Lisa Moore', 'James Taylor', 'Patricia Anderson',
            'Charles Thomas', 'Barbara Martinez', 'Joseph Harris', 'Linda Clark', 'Thomas Lewis',
            'Mary Lee', 'William Walker', 'Elizabeth Hall', 'Steven Allen', 'Nancy Young'
        ];

        // Loop untuk memasukkan 20 data pasien
        for ($i = 0; $i < 20; $i++) {
            // Generate data pasien acak
            $nama = $namaPasien[$i];
            $nik = '1234567890' . str_pad($i, 3, '0', STR_PAD_LEFT); // Contoh NIK
            $dob = date('Y-m-d', strtotime('-' . rand(20, 60) . ' years')); // Tanggal lahir acak antara 20 - 60 tahun
            $jenisKelamin = rand(0, 1) == 0 ? 'L' : 'P'; // Jenis kelamin acak
            $alamat = 'Alamat ' . $i; // Alamat acak
            $noHp = '08' . rand(100000000, 999999999); // Nomor HP acak
            $tanggalDaftar = date('Y-m-d'); // Tanggal daftar saat ini
            $idKabupaten = rand(1, 10); // ID Kabupaten antara 1 hingga 10

            // Insert data pasien
            $this->insert('tbl_pasien', [
                'nama_lengkap' => $nama,
                'nik' => $nik,
                'dob' => $dob,
                'jenis_kelamin' => $jenisKelamin,
                'alamat' => $alamat,
                'id_kabupaten' => $idKabupaten,
                'no_hp' => $noHp,
                'tanggal_daftar' => $tanggalDaftar,
            ]);
        }
    }

    public function down()
    {
        // Menghapus semua data dari tabel tbl_pasien
        $this->truncateTable('tbl_pasien');
    }

}