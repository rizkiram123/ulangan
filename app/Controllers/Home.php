<?php

namespace App\Controllers;

use App\Models\BuburPedasModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new BuburPedasModel();
        $search = $this->request->getGet('search');

        if ($search) {
            $menus = $model->like('nama', $search)->orLike('deskripsi', $search)->findAll();
        } else {
            $menus = $model->findAll();
        }

        $data = [
            'title'  => 'Bubur Pedas khas Kalimantan - Cita Rasa Otentik',
            'menus'  => $menus,
            'search' => $search,
        ];

        return view('homepage', $data);
    }
}
