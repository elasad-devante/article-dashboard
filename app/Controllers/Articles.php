<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Articles extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function Index()
    {
        $data['artikel'] = $this->model->orderBy('created_at', 'DESC')->findAll();
        return view('Admin\articles', $data);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('sukses', 'Artikel dihapus.');
        return redirect()->to('/articles');
    }
}
