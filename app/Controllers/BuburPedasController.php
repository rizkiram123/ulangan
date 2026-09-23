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
        $search = $this->request->getGet('search');
        if ($search) {
            $menus = $this->buburModel->like('nama', $search)->orLike('deskripsi', $search)->findAll();
        } else {
            $menus = $this->buburModel->findAll();
        }

        $data = [
            'title'  => 'Kelola Menu Bubur Pedas - Admin Panel',
            'menus'  => $menus,
            'search' => $search,
        ];

        return view('bubur_pedas/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu Bubur Pedas Baru',
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
