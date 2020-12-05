<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'image' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'role_id' => [
				'type'           => 'INT',
			],
			'is_active' => [
				'type'           => 'INT',
			],
			'date_created' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],

		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
