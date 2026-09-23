<?php

namespace App\Models;

use CodeIgniter\Model;

class BuburPedasModel extends Model
{
    protected $table            = 'bubur_pedas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'harga', 'deskripsi', 'stok', 'gambar', 'kategori'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'nama'  => 'required|min_length[3]|max_length[255]',
        'harga' => 'required|numeric|greater_than[0]',
        'stok'  => 'required|integer|greater_than_equal_to[0]',
    ];
    protected $validationMessages   = [
        'nama'  => [
            'required'   => 'Nama menu bubur pedas wajib diisi.',
            'min_length' => 'Nama menu minimal 3 karakter.',
        ],
        'harga' => [
            'required'     => 'Harga wajib diisi.',
            'numeric'      => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih besar dari 0.',
        ],
        'stok'  => [
            'required' => 'Jumlah stok wajib diisi.',
            'integer'  => 'Stok harus berupa bilangan bulat.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
