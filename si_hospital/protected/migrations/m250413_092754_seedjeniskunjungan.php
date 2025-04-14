<?php

class m250413_092754_seedjeniskunjungan extends CDbMigration
{
	public function up()
	{
		$data = [
			["Pemeriksaan Umum"],
			["Pemeriksaan Gigi"],
			["Konsultasi Kesehatan"],
			["Surat Keterangan Sehat"],
			["Pemeriksaan Ibu Hamil"],
			["Pemeriksaan Anak"],
			["Vaksinasi"],
			["Medical Check Up (MCU)"],
			["Kontrol Ulang"],
			["Rujukan"],
        ];

        foreach ($data as $row) {
            list( $nama) = $row;
            $this->insert('tbl_jenis_kunjungan', [
                'nama_jenis' => $nama,
            ]);
        }
	}

	public function down()
	{
		echo "m250412_195024_seedjeniskunjungan does not support migration down.\n";
		return false;
	}

}