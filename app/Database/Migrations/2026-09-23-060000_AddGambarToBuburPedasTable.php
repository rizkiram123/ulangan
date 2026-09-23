<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGambarToBuburPedasTable extends Migration
{
    public function up()
    {
        $fields = [
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'stok',
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'default'    => 'Spesial',
                'after'      => 'gambar',
            ],
        ];
        $this->forge->addColumn('bubur_pedas', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('bubur_pedas', ['gambar', 'kategori']);
    }
}
