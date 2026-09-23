<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BuburPedasSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('bubur_pedas')->emptyTable();

        $data = [
            [
                'nama'       => 'Bubur Pedas Spesial Khas Sambas',
                'harga'      => 25000,
                'deskripsi'  => 'Bubur tradisional Sambas dengan rempah daun kesum, pakis, kangkung, wortel, dan topping emping renyah. Aroma gurih otentik warisan leluhur Kalimantan Barat.',
                'stok'       => 20,
                'kategori'   => 'Tradisional',
                'gambar'     => 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Seafood Udang & Cumi',
                'harga'      => 35000,
                'deskripsi'  => 'Variasi bubur pedas melimpah topping cumi segar dan udang galah pilihan dengan kuah bumbu rempah aromatik kaya protein.',
                'stok'       => 15,
                'kategori'   => 'Seafood',
                'gambar'     => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Daging Sapi Cincang',
                'harga'      => 30000,
                'deskripsi'  => 'Disajikan hangat dengan potongan daging sapi empuk cincang dan taburan bawang goreng harum serta parutan emping gurih.',
                'stok'       => 18,
                'kategori'   => 'Daging',
                'gambar'     => 'https://images.unsplash.com/photo-1547496592-1b9d4ee09520?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Ayam Suwir Telur Asin',
                'harga'      => 27000,
                'deskripsi'  => 'Bubur pedas gurih dengan topping ayam suwir bumbu kuning rempah dan parutan telur asin masir panggang.',
                'stok'       => 25,
                'kategori'   => 'Ayam',
                'gambar'     => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Komplit Extra Paku & Daun Kesum',
                'harga'      => 32000,
                'deskripsi'  => 'Porsi komplit dengan extra sayur pakis segar, daun kesum wangi, teri goreng, dan kacang tanah sangrai renyah.',
                'stok'       => 12,
                'kategori'   => 'Tradisional',
                'gambar'     => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Vegetarian Melayu',
                'harga'      => 20000,
                'deskripsi'  => 'Menu sehat tanpa daging, kaya serat 10 macam sayuran lokal, jagung manis, wortel, dan tahu goreng kriuk renyah.',
                'stok'       => 30,
                'kategori'   => 'Vegetarian',
                'gambar'     => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Pedas Mamus (Level 5)',
                'harga'      => 28000,
                'deskripsi'  => 'Khusus pecinta pedas ekstrem dengan irisan cabai rawit merah segar, minyak cabai racikan khas Sambas, dan rempah pedas mantap.',
                'stok'       => 10,
                'kategori'   => 'Pedas Ekstrem',
                'gambar'     => 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Bubur Pedas Topping Ikan Teri & Kacang Crispy',
                'harga'      => 22000,
                'deskripsi'  => 'Bubur pedas gurih renyah disajikan dengan limpahan ikan teri medan pilihan dan kacang tanah sangrai garing.',
                'stok'       => 22,
                'kategori'   => 'Tradisional',
                'gambar'     => 'https://images.unsplash.com/photo-1516714435131-44d6b64dc6a2?auto=format&fit=crop&w=800&q=80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('bubur_pedas')->insertBatch($data);
    }
}
