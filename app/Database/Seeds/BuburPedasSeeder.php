<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BuburPedasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       => 'Bubur Pedas Spesial Khas Sambas',
                'harga'      => 25000,
                'deskripsi'  => 'Bubur tradisional Sambas dengan rempah daun kesum, pakis, kangkung, dan topping emping renyah.',
                'stok'       => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Seafood Udang & Cumi',
                'harga'      => 35000,
                'deskripsi'  => 'Variasi bubur pedas melimpah topping cumi segar dan udang galah pilihan dengan kuah bumbu kaya aroma.',
                'stok'       => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Daging Sapi Cincang',
                'harga'      => 30000,
                'deskripsi'  => 'Disajikan hangat dengan potongan daging sapi empuk cincang dan taburan bawang goreng harum.',
                'stok'       => 18,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Ayam Suwir Telur Asin',
                'harga'      => 27000,
                'deskripsi'  => 'Bubur pedas gurih dengan topping ayam suwir bumbu rempah dan parutan telur asin masir.',
                'stok'       => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Komplit Extra Paku & Daun Kesum',
                'harga'      => 32000,
                'deskripsi'  => 'Porsi komplit dengan extra sayur pakis segar, daun kesum wangi, teri goreng, dan kacang tanah.',
                'stok'       => 12,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Vegetarian Melayu',
                'harga'      => 20000,
                'deskripsi'  => 'Menu sehat tanpa daging, kaya serat sayuran lokal, jagung manis, wortel, dan tahu goreng kriuk.',
                'stok'       => 30,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Pedas Mamus (Level 5)',
                'harga'      => 28000,
                'deskripsi'  => 'Khusus pecinta pedas ekstrem dengan irisan cabai rawit merah segar dan minyak cabai racikan khas.',
                'stok'       => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Topping Ikan Teri & Kacang Crispy',
                'harga'      => 22000,
                'deskripsi'  => 'Bubur pedas gurih renyah disajikan dengan limpahan ikan teri medan pilihan dan kacang tanah sangrai.',
                'stok'       => 22,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('bubur_pedas')->insertBatch($data);
    }
}
