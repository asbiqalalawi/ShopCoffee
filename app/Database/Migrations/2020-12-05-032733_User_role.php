<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRole extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'role_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'role'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],

		]);
		$this->forge->addKey('role_id', true);
		$this->forge->createTable('user_role');
	}

	public function down()
	{
		$this->forge->dropTable('user_role');
	}
}
