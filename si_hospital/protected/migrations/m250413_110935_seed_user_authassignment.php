<?php

class m250413_110935_seed_user_authassignment extends CDbMigration
{
	public function up()
    {
        $assignments = [
            ['kelolaDatamaster', 1],
            ['super_user', 2],
            ['kelolaPasien', 3],
            ['kelolaKunjungan', 4],
            ['kelolaPembayaran', 5],
        ];

        foreach ($assignments as $row) {
            list($itemname, $userid) = $row;

            $this->insert('AuthAssignment', [
                'itemname' => $itemname,
                'userid' => $userid,
                'bizrule' => null,
                'data' => null,
            ]);
        }
    }

    public function down()
    {
        $this->delete('AuthAssignment', 'userid IN (1, 2, 3, 4, 5)');
    }
}