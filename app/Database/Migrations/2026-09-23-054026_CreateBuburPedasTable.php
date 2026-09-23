<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBuburPedasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bubur_pedas');
    }

    public function down()
    {
        $this->forge->dropTable('bubur_pedas');
    }
}
