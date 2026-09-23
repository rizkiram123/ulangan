<?php

namespace App\Controllers;

use App\Models\BuburPedasModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new BuburPedasModel();

        $search      = $this->request->getGet('search');
        $kategori    = $this->request->getGet('kategori');
        $stokStatus  = $this->request->getGet('stok');
        $sort        = $this->request->getGet('sort');

        $builder = $model->builder();

        // Fitur 1: Pencarian (Search)
        if ($search) {
            $builder->groupStart()
                    ->like('nama', $search)
                    ->orLike('deskripsi', $search)
                    ->orLike('kategori', $search)
                    ->groupEnd();
        }

        // Fitur 2: Filter Kategori
        if ($kategori && $kategori !== 'all') {
            $builder->where('kategori', $kategori);
        }

        // Fitur 2: Filter Stok Status
        if ($stokStatus === 'tersedia') {
            $builder->where('stok >', 0);
        } elseif ($stokStatus === 'habis') {
            $builder->where('stok', 0);
        }

        // Sorting
        if ($sort === 'harga_asc') {
            $builder->orderBy('harga', 'ASC');
        } elseif ($sort === 'harga_desc') {
            $builder->orderBy('harga', 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        $menus = $builder->get()->getResultArray();

        // Get unique categories for filter dropdown
        $categories = ['Tradisional', 'Seafood', 'Daging', 'Ayam', 'Vegetarian', 'Pedas Ekstrem'];

        $data = [
            'title'       => 'Warung Bubur Pedas Khas Sambas - Katalog & Detail',
            'menus'       => $menus,
            'search'      => $search,
            'kategori'    => $kategori,
            'stokStatus'  => $stokStatus,
            'sort'        => $sort,
            'categories'  => $categories,
        ];

        return view('homepage', $data);
    }

    public function detail($id = null)
    {
        $model = new BuburPedasModel();
        $menu  = $model->find($id);

        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu Bubur Pedas dengan ID $id tidak ditemukan.");
        }

        // Get recommended/related menus
        $related = $model->where('id !=', $id)->findAll(3);

        $data = [
            'title'   => 'Detail ' . $menu['nama'] . ' - Bubur Pedas Sambas',
            'menu'    => $menu,
            'related' => $related,
        ];

        return view('bubur_pedas/detail', $data);
    }
}
