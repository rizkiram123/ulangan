<?php

namespace App\Controllers;

use App\Models\BuburPedasModel;

class BuburPedasController extends BaseController
{
    protected $buburModel;

    public function __construct()
    {
        $this->buburModel = new BuburPedasModel();
    }

    public function index()
    {
        $search   = $this->request->getGet('search');
        $kategori = $this->request->getGet('kategori');

        $builder = $this->buburModel->builder();

        if ($search) {
            $builder->groupStart()
                    ->like('nama', $search)
                    ->orLike('deskripsi', $search)
                    ->orLike('kategori', $search)
                    ->groupEnd();
        }

        if ($kategori && $kategori !== 'all') {
            $builder->where('kategori', $kategori);
        }

        $menus = $builder->orderBy('id', 'DESC')->get()->getResultArray();
        $categories = ['Tradisional', 'Seafood', 'Daging', 'Ayam', 'Vegetarian', 'Pedas Ekstrem'];

        $data = [
            'title'      => 'Kelola Menu Bubur Pedas - Admin Panel',
            'menus'      => $menus,
            'search'     => $search,
            'kategori'   => $kategori,
            'categories' => $categories,
        ];

        return view('bubur_pedas/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu Bubur Pedas Baru',
            'categories' => ['Tradisional', 'Seafood', 'Daging', 'Ayam', 'Vegetarian', 'Pedas Ekstrem'],
            'validation' => \Config\Services::validation(),
        ];

        return view('bubur_pedas/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric|greater_than[0]',
            'stok'  => 'required|integer|greater_than_equal_to[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buburpedas/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->buburModel->save([
            'nama'      => $this->request->getPost('nama'),
            'harga'     => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'stok'      => $this->request->getPost('stok'),
            'kategori'  => $this->request->getPost('kategori') ?: 'Tradisional',
            'gambar'    => $this->request->getPost('gambar') ?: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=800&q=80',
        ]);

        return redirect()->to('/buburpedas')->with('success', 'Menu Bubur Pedas berhasil ditambahkan!');
    }

    public function edit($id = null)
    {
        $menu = $this->buburModel->find($id);

        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu dengan ID $id tidak ditemukan.");
        }

        $data = [
            'title'      => 'Edit Menu Bubur Pedas',
            'menu'       => $menu,
            'categories' => ['Tradisional', 'Seafood', 'Daging', 'Ayam', 'Vegetarian', 'Pedas Ekstrem'],
            'validation' => \Config\Services::validation(),
        ];

        return view('bubur_pedas/edit', $data);
    }

    public function update($id = null)
    {
        $menu = $this->buburModel->find($id);
        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu dengan ID $id tidak ditemukan.");
        }

        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric|greater_than[0]',
            'stok'  => 'required|integer|greater_than_equal_to[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buburpedas/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->buburModel->update($id, [
            'nama'      => $this->request->getPost('nama'),
            'harga'     => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'stok'      => $this->request->getPost('stok'),
            'kategori'  => $this->request->getPost('kategori') ?: 'Tradisional',
            'gambar'    => $this->request->getPost('gambar') ?: $menu['gambar'],
        ]);

        return redirect()->to('/buburpedas')->with('success', 'Menu Bubur Pedas berhasil diperbarui!');
    }

    public function delete($id = null)
    {
        $menu = $this->buburModel->find($id);
        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu dengan ID $id tidak ditemukan.");
        }

        $this->buburModel->delete($id);

        return redirect()->to('/buburpedas')->with('success', 'Menu Bubur Pedas berhasil dihapus!');
    }
}
