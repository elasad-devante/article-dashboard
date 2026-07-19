<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Add extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function index($identifier = null)
    {
        $artikel = $this->findArticleByIdentifier($identifier);
        return view('Admin/add', ['artikel' => $artikel]);
    }

    public function save($identifier = null)
    {
        $data = $this->request->getPost(['judul', 'slug', 'konten', 'status']);

        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['judul'], '-', true);
        }

        $article = $this->findArticleByIdentifier($identifier);
        $articleId = $article['id'] ?? null;

        if ($articleId === null && !empty($data['slug'])) {
            $existing = $this->model->where('slug', $data['slug'])->first();
            $articleId = $existing['id'] ?? null;
        }

        $success = $articleId
            ? $this->model->update($articleId, $data)
            : $this->model->insert($data);

        if ($success === false) {
            return view('Admin/add', [
                'artikel' => $article,
                'errors'  => $this->model->errors(),
                'old'     => $data,
            ]);
        }

        session()->setFlashdata('sukses', $articleId ? 'Artikel berhasil diperbarui.' : 'Artikel berhasil disimpan.');
        return redirect()->to('/articles');
    }

    protected function findArticleByIdentifier($identifier)
    {
        if ($identifier === null || $identifier === '') {
            return null;
        }

        if (is_numeric($identifier)) {
            return $this->model->find($identifier);
        }

        return $this->model->where('slug', $identifier)->first();
    }
}
