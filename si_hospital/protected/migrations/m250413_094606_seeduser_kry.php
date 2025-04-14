<?php

class m250413_094606_seeduser_kry extends CDbMigration
{
	public function up()
	{
		$datakaryawan = [
			[1, 'Dewi Lestari', 312019238, 'P', '1991-03-12', '081234567890', 'Jl. Melati No. 5', 1],
			[2, 'Budi Santoso', 312019239, 'L', '1988-07-10', '081234567891', 'Jl. Kenanga No. 10', 2],
			[3, 'Siti Aminah',  312019240, 'P', '1990-09-14', '081234567892', 'Jl. Mawar No. 8', 1],
			[4, 'Andi Pratama', 312019241, 'L', '1992-04-20', '081234567893', 'Jl. Anggrek No. 2', 2],
			[5, 'Mega Rahayu',  312019242, 'P', '1987-06-30', '081234567894', 'Jl. Dahlia No. 7', 1],
		];

		foreach ($datakaryawan as $row) {
			list(
				$id_karyawan,
				$nama,
				$nip,
				$jenis_kelamin,
				$dob,
				$kontak,
				$alamat,
				$id_kabupaten
			) = $row;

			$this->insert('tbl_karyawan', [
				'id_karyawan'    => $id_karyawan,
				'nama'           => $nama,
				'nip'            => $nip,
				'jenis_kelamin'  => $jenis_kelamin,
				'dob'            => $dob,
				'kontak'         => $kontak,
				'alamat'         => $alamat,
				'id_kabupaten'   => $id_kabupaten,
			]);
		}

		$datapengguna = [
			[1, 1, 'dewi.lestari',   'dewi.lestari', true, '2023-01-10'],
			[2, 2, 'budi.santoso',   'budi.santoso', true, '2023-03-22'],
			[3, 3, 'siti.aminah',    'siti.aminah', true, '2023-05-15'],
			[4, 4, 'andi.pratama',   'andi.pratama', true, '2023-07-18'],
			[5, 5, 'mega.rahayu',    'mega.rahayu', true, '2023-09-12'],
		];

		foreach ($datapengguna as $row) {
			list(
				$id_users,
				$id_karyawan,
				$username,
				$password,
				$status,
				$created_at
			) = $row;

			$hashedPassword = CPasswordHelper::hashPassword($password);

			$this->insert('tbl_users', [
				'id_users'     => $id_users,
				'id_karyawan'  => $id_karyawan,
				'username'     => $username,
				'password'     => $hashedPassword,
				'status'       => $status,
				'created_at'   => $created_at,
			]);
		}
	}

	public function down()
	{
		echo "m250413_100000_seed_users_karyawan does not support migration down.\n";
		return false;
	}
}