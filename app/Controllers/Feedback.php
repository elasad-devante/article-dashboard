<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class Feedback extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new FeedbackModel();
    }

    public function index()
    {
        $feedbacks = $this->model->orderBy('created_at', 'DESC')->findAll();

        return view('Admin/feedback', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost(['nama', 'email', 'pesan']);
        $data['nama'] = trim($data['nama'] ?? '');
        $data['email'] = trim($data['email'] ?? '');
        $data['pesan'] = trim($data['pesan'] ?? '');

        if ($this->model->insert($data) === false) {
            return view('Admin/feedback', [
                'feedbacks' => $this->model->orderBy('created_at', 'DESC')->findAll(),
                'errors' => $this->model->errors(),
                'old' => $data,
            ]);
        }

        session()->setFlashdata('sukses', 'Feedback berhasil dikirim.');
        return redirect()->to('/feedback');
    }
}
