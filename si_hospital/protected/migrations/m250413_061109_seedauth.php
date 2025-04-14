<?php

class m250413_061109_seedauth extends CDbMigration
{
	public function up()
    {
        // ===== SEED AUTH ITEM =====
        // Role (type = 2)
        $this->insert('AuthItem', [
            'name' => 'admin',
            'type' => 2,
            'description' => 'Administrator',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'super_user',
            'type' => 2,
            'description' => 'Super User',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'petugas_pendaftaran',
            'type' => 2,
            'description' => 'Petugas Pendaftaran',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'dokter',
            'type' => 2,
            'description' => 'Dokter',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'kasir',
            'type' => 2,
            'description' => 'Kasir',
            'bizrule' => null,
            'data' => null,
        ]);

        // Permission (type = 0)
        $this->insert('AuthItem', [
            'name' => 'kelolaDatamaster',
            'type' => 0,
            'description' => 'Mengelola Data Master',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'kelolaPasien',
            'type' => 0,
            'description' => 'Mengelola Pasien',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'kelolaKunjungan',
            'type' => 0,
            'description' => 'Mengelola Kunjungan Pasien',
            'bizrule' => null,
            'data' => null,
        ]);

        $this->insert('AuthItem', [
            'name' => 'kelolaPembayaran',
            'type' => 0,
            'description' => 'Mengelola Pembayaran',
            'bizrule' => null,
            'data' => null,
        ]);

        // ===== SEED AUTH ITEM CHILD =====
        // Super User ke semua permission (akses penuh)
        $this->insert('AuthItemChild', ['parent' => 'super_user', 'child' => 'kelolaDatamaster']);
        $this->insert('AuthItemChild', ['parent' => 'super_user', 'child' => 'kelolaPasien']);
        $this->insert('AuthItemChild', ['parent' => 'super_user', 'child' => 'kelolaKunjungan']);
        $this->insert('AuthItemChild', ['parent' => 'super_user', 'child' => 'kelolaPembayaran']);
        
        // Admin ke permission terbatas
        $this->insert('AuthItemChild', ['parent' => 'admin', 'child' => 'kelolaDatamaster']);
        
        // Petugas Pendaftaran hanya akses kelolaPasien
        $this->insert('AuthItemChild', ['parent' => 'petugas_pendaftaran', 'child' => 'kelolaPasien']);
        
        // Dokter hanya akses kelolaKunjungan
        $this->insert('AuthItemChild', ['parent' => 'dokter', 'child' => 'kelolaKunjungan']);
        
        // Kasir hanya akses kelolaPembayaran
        $this->insert('AuthItemChild', ['parent' => 'kasir', 'child' => 'kelolaPembayaran']);
    }

    public function down()
    {
        // Hapus child dulu karena tergantung parent
        $this->delete('AuthItemChild', '1=1');
        $this->delete('AuthItem', 'name IN (
            "admin", "super_user", "petugas_pendaftaran", "dokter", "kasir",
            "kelolaDatamaster", "kelolaPasien", "kelolaKunjungan", "kelolaPembayaran"
        )');
    }
}