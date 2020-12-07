<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pesanan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'jumlah'       => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'harga'       => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
		]);
		$this->forge->addKey('id_pesanan', true);
		$this->forge->createTable('pesanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
