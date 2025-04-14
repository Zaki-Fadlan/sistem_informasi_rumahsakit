<?php

class m250413_092735_seedtindakan extends CDbMigration
{
	public function up()
	{
		$data = [
			
			["Pemeriksaan Umum","Pemeriksaan oleh dokter umum",50000],
			["Pemeriksaan Gigi","Cek kondisi gigi dan mulut",70000],
			["Cabut Gigi","Pencabutan gigi oleh dokter gigi",100000],
			["Suntik Vaksin","Penyuntikan vaksin",85000],
			["Konsultasi Kesehatan","Konsultasi non-fisik",60000],
			["Pemberian Obat Injeksi","Obat yang diberikan melalui suntikan",30000],
			["Pemeriksaan Kehamilan","Pemeriksaan fisik dan USG ringan",90000],
			["Jahit Luka","Penjahitan luka ringan hingga sedang",150000],
			["Tes Urin","Pemeriksaan urin di laboratorium",40000],
			["Tes Darah","Pengambilan dan pemeriksaan darah",80000],
        ];

        foreach ($data as $row) {
            list( $nama, $deskripsi,$biaya) = $row;
            $this->insert('tbl_tindakan', [
                'nama_tindakan' => $nama,
                'deskripsi' => $deskripsi,
                'biaya' => $biaya
            ]);
        }
	}

	public function down()
	{
		echo "m250412_194352_seedtindakan does not support migration down.\n";
		return false;
	}
}