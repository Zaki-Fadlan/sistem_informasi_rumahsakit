<?php

class m250413_061034_auth extends CDbMigration
{
	public function up()
	{
		// Tabel AuthItem
		$this->createTable('AuthItem', array(
			'name' => 'string NOT NULL',
			'type' => 'integer NOT NULL',
			'description' => 'text',
			'bizrule' => 'text',
			'data' => 'text',
			'PRIMARY KEY(name)',
		));

		// Tabel AuthItemChild
		$this->createTable('AuthItemChild', array(
			'parent' => 'string NOT NULL',
			'child' => 'string NOT NULL',
			'PRIMARY KEY(parent, child)',
		));

		// Foreign Key untuk AuthItemChild
		$this->addForeignKey('fk_authitemchild_parent', 'AuthItemChild', 'parent', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_authitemchild_child', 'AuthItemChild', 'child', 'AuthItem', 'name', 'CASCADE', 'CASCADE');

		// Tabel AuthAssignment
		$this->createTable('AuthAssignment', array(
			'itemname' => 'string NOT NULL',
			'userid' => 'integer NOT NULL',
			'bizrule' => 'text',
			'data' => 'text',
			'PRIMARY KEY(itemname, userid)',
		));

		// Foreign Key untuk AuthAssignment
		$this->addForeignKey('fk_authassignment_itemname', 'AuthAssignment', 'itemname', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
		$this->addForeignKey(
			'fk_authassignment_userid',
			'AuthAssignment',
			'userid',
			'tbl_users',
			'id_users',
			'CASCADE',
			'CASCADE'
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_authassignment_itemname', 'AuthAssignment');
		$this->dropForeignKey('fk_authitemchild_parent', 'AuthItemChild');
		$this->dropForeignKey('fk_authitemchild_child', 'AuthItemChild');

		$this->dropTable('AuthAssignment');
		$this->dropTable('AuthItemChild');
		$this->dropTable('AuthItem');
	}
}